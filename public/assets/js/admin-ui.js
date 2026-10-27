/* admin-ui.js — sidebar mobile, tabel responsif otomatis, dedupe notifikasi */
(function () {
  'use strict';
  var d = document;

  /* ---------- Sidebar (off-canvas di HP/tablet) ---------- */
  var side = d.getElementById('admSidebar');
  var overlay = d.getElementById('admOverlay');
  var burger = d.getElementById('admBurger');
  function setOpen(open) {
    if (!side) return;
    side.classList.toggle('is-open', open);
    overlay.classList.toggle('is-open', open);
    burger && burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    d.body.style.overflow = open ? 'hidden' : '';
  }
  burger && burger.addEventListener('click', function () { setOpen(!side.classList.contains('is-open')); });
  overlay && overlay.addEventListener('click', function () { setOpen(false); });
  d.addEventListener('keydown', function (e) { if (e.key === 'Escape') setOpen(false); });
  side && side.addEventListener('click', function (e) { if (e.target.closest('a')) setOpen(false); });
  window.matchMedia('(min-width:992px)').addEventListener('change', function (m) { if (m.matches) setOpen(false); });
  // pastikan menu aktif terlihat di sidebar
  var act = side && side.querySelector('a.active');
  if (act && act.scrollIntoView) act.scrollIntoView({ block: 'center' });

  /* ---------- Tabel: bungkus + label kolom untuk mode kartu di HP ---------- */
  d.querySelectorAll('.adm-content table').forEach(function (t) {
    if (t.closest('.adm-table-wrap') || t.closest('.table-responsive')) return;
    var parent = t.parentElement;
    var wrap = d.createElement('div');
    wrap.className = 'adm-table-wrap' + (parent && parent.matches('.bg-white,.card,.card-body') ? '' : ' adm-card');
    parent.insertBefore(wrap, t);
    wrap.appendChild(t);

    var heads = t.querySelectorAll('thead tr:last-child th');
    var labels = Array.prototype.map.call(heads, function (th) { return th.textContent.trim(); });
    if (!labels.length) return;
    var ok = false;
    t.querySelectorAll('tbody tr').forEach(function (tr) {
      var cells = tr.children;
      if (cells.length === 1 && cells[0].colSpan > 1) { cells[0].classList.add('adm-empty'); ok = true; return; }
      if (cells.length !== labels.length) return;
      Array.prototype.forEach.call(cells, function (td, i) {
        if (td.tagName !== 'TD') return;
        td.setAttribute('data-label', labels[i]);
        // kolom aksi (berisi tombol/link/form & judulnya "Aksi") => rata kanan tanpa label
        if (/^(aksi|action|actions)$/i.test(labels[i])) td.classList.add('adm-actions');
      });
      ok = true;
    });
    if (ok) t.classList.add('adm-stack');
  });

  /* ---------- Toast flash (disembunyikan bila halaman sudah punya .alert sendiri) ---------- */
  var flash = d.getElementById('admFlash');
  if (flash) {
    if (d.querySelector('.adm-content .alert')) { flash.remove(); }
    else { setTimeout(function () { flash.style.transition = 'opacity .4s'; flash.style.opacity = 0; setTimeout(function () { flash.remove(); }, 450); }, 4500); }
  }
})();
