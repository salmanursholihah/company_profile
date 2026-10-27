<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\GuideLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGuideLessonController extends Controller
{
    public function index(Guide $guide)
    {
        $lessons = $guide->lessons()->get();

        return view('admin.guides.lessons.index', compact('guide', 'lessons'));
    }

    public function create(Guide $guide)
    {
        $next = (int) $guide->lessons()->max('sort_order') + 1;

        return view('admin.guides.lessons.form', [
            'guide'  => $guide,
            'lesson' => new GuideLesson(['type' => 'video', 'is_published' => true, 'sort_order' => $next]),
        ]);
    }

    public function store(Request $request, Guide $guide)
    {
        $data = $this->validated($request, null);

        if ($request->hasFile('file')) {
            $f = $request->file('file');
            $data['file_path'] = $f->store('guides/files', 'local'); // disk privat
            $data['file_name'] = $f->getClientOriginalName();
        }

        $guide->lessons()->create($data);

        return redirect()->route('admin.guides.lessons.index', $guide)->with('success', 'Materi ditambahkan.');
    }

    public function edit(Guide $guide, GuideLesson $lesson)
    {
        abort_unless($lesson->guide_id === $guide->id, 404);

        return view('admin.guides.lessons.form', compact('guide', 'lesson'));
    }

    public function update(Request $request, Guide $guide, GuideLesson $lesson)
    {
        abort_unless($lesson->guide_id === $guide->id, 404);

        $data = $this->validated($request, $lesson);

        if ($request->hasFile('file')) {
            if ($lesson->file_path) {
                Storage::disk('local')->delete($lesson->file_path);
            }
            $f = $request->file('file');
            $data['file_path'] = $f->store('guides/files', 'local');
            $data['file_name'] = $f->getClientOriginalName();
        }

        // Ganti tipe -> bersihkan field tipe lama
        if ($data['type'] !== 'file' && $lesson->file_path) {
            Storage::disk('local')->delete($lesson->file_path);
            $data['file_path'] = null;
            $data['file_name'] = null;
        }

        $lesson->update($data);

        return redirect()->route('admin.guides.lessons.index', $guide)->with('success', 'Materi diperbarui.');
    }

    public function destroy(Guide $guide, GuideLesson $lesson)
    {
        abort_unless($lesson->guide_id === $guide->id, 404);

        if ($lesson->file_path) {
            Storage::disk('local')->delete($lesson->file_path);
        }
        $lesson->delete();

        return redirect()->route('admin.guides.lessons.index', $guide)->with('success', 'Materi dihapus.');
    }

    protected function validated(Request $r, ?GuideLesson $lesson): array
    {
        $type = $r->input('type');

        $rules = [
            'title'            => 'required|string|max:200',
            'type'             => 'required|in:video,file,article',
            'description'      => 'nullable|string|max:1000',
            'duration_minutes' => 'nullable|integer|min:0|max:65000',
            'sort_order'       => 'nullable|integer|min:0',
            'video_url'        => [$type === 'video' ? 'required' : 'nullable', 'string', 'max:255',
                                   'regex:~(youtu\.be/|youtube\.com/)~i'],
            'content'          => [$type === 'article' ? 'required' : 'nullable', 'string'],
            'file'             => [($type === 'file' && ! ($lesson && $lesson->file_path)) ? 'required' : 'nullable',
                                   'file', 'max:20480', 'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip'],
        ];

        $d = $r->validate($rules, [
            'video_url.regex' => 'Link harus berupa link YouTube.',
        ]);
        unset($d['file']);

        $d['sort_order']   = $d['sort_order'] ?? 0;
        $d['is_free']      = $r->boolean('is_free');
        $d['is_published'] = $r->boolean('is_published');

        // Kosongkan field yang tidak relevan dengan tipe
        if ($d['type'] !== 'video') {
            $d['video_url'] = null;
        }
        if ($d['type'] !== 'article') {
            $d['content'] = null;
        }

        return $d;
    }
}
