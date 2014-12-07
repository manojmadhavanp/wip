/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'Iconicmm\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-imagesbirthday' : '&#xe000;',
			'icon-imageswizard' : '&#xe001;',
			'icon-imagesemail' : '&#xe002;',
			'icon-imagescertificate' : '&#xe003;',
			'icon-imageslock' : '&#xe004;',
			'icon-imagesuser' : '&#xe005;',
			'icon-imagesfriends' : '&#xe006;',
			'icon-imagescopyright' : '&#xe007;',
			'icon-imagescalendar' : '&#xe008;',
			'icon-imagescancel' : '&#xe009;',
			'icon-imagesplus' : '&#xe00a;',
			'icon-imagesminus' : '&#xe00b;',
			'icon-imagesnotice' : '&#xe00c;',
			'icon-imagescheckmark' : '&#xe00d;',
			'icon-imagescancel-2' : '&#xe00e;',
			'icon-imagesphone' : '&#xe00f;',
			'icon-imageschat' : '&#xe010;',
			'icon-imagespin' : '&#xe011;',
			'icon-imagesmobile' : '&#xe012;',
			'icon-imagescaret-down' : '&#xe013;',
			'icon-imagescaret-up' : '&#xe014;',
			'icon-imagesswitch' : '&#xe015;',
			'icon-imagesapple' : '&#xe016;',
			'icon-imageswinsows' : '&#xe017;',
			'icon-imagesfile-word' : '&#xe018;',
			'icon-imagesfile-pdf' : '&#xe019;',
			'icon-imagestux' : '&#xe01a;',
			'icon-imagesandroid' : '&#xe01b;',
			'icon-imagesblogger' : '&#xe01c;',
			'icon-imagesskype' : '&#xe01d;',
			'icon-imagesfile-excel' : '&#xe01e;',
			'icon-imagesfile-powerpoint' : '&#xe01f;',
			'icon-imagesfirefox' : '&#xe020;',
			'icon-imagesIE' : '&#xe021;',
			'icon-imagesopera' : '&#xe022;',
			'icon-imagessafari' : '&#xe023;',
			'icon-imageshtml5' : '&#xe024;',
			'icon-imagesIcoMoon' : '&#xe025;',
			'icon-imageswordpress' : '&#xe026;',
			'icon-imagestwitter' : '&#xe027;',
			'icon-imagesgoogle-plus' : '&#xe028;',
			'icon-imagesfacebook' : '&#xe029;',
			'icon-imagesthumbs-up' : '&#xe02a;',
			'icon-imagesthumbs-up-2' : '&#xe02b;',
			'icon-imagesattachment' : '&#xe02c;',
			'icon-imageslink' : '&#xe02d;',
			'icon-imagesglobe' : '&#xe02e;',
			'icon-imagesearth' : '&#xe02f;',
			'icon-imagesstar' : '&#xe030;',
			'icon-imagesstar-2' : '&#xe031;',
			'icon-imagesstar-3' : '&#xe032;',
			'icon-imagesremove' : '&#xe033;',
			'icon-imagesremove-2' : '&#xe034;',
			'icon-imagescogs' : '&#xe035;',
			'icon-imageswrench' : '&#xe036;',
			'icon-imageslock-2' : '&#xe037;',
			'icon-imagesunlocked' : '&#xe038;',
			'icon-imageskey' : '&#xe039;',
			'icon-imagesuser-2' : '&#xe03a;',
			'icon-imagesuser-3' : '&#xe03b;',
			'icon-imagesusers' : '&#xe03c;',
			'icon-imagesuser-4' : '&#xe03d;',
			'icon-imagesdownload' : '&#xe03e;',
			'icon-imagesmobile-2' : '&#xe03f;',
			'icon-imagesmobile-3' : '&#xe040;',
			'icon-imageslaptop' : '&#xe041;',
			'icon-imagesscreen' : '&#xe042;',
			'icon-imagesprint' : '&#xe043;',
			'icon-imagescalendar-2' : '&#xe044;',
			'icon-imagesalarm' : '&#xe045;',
			'icon-imagesbell' : '&#xe046;',
			'icon-imagescart' : '&#xe047;',
			'icon-imageshome' : '&#xe048;',
			'icon-imagespencil' : '&#xe049;',
			'icon-imagespencil-2' : '&#xe04a;',
			'icon-imagesminus-2' : '&#xe04b;',
			'icon-imagesplus-2' : '&#xe04c;',
			'icon-imagescross' : '&#xe04d;',
			'icon-imagesminus-3' : '&#xe04e;',
			'icon-imagesplus-3' : '&#xe04f;',
			'icon-imagescross-2' : '&#xe050;',
			'icon-imagesinfo' : '&#xe051;',
			'icon-imageshelp' : '&#xe052;',
			'icon-imagescross-3' : '&#xe053;',
			'icon-imagesplus-4' : '&#xe054;',
			'icon-imagesminus-4' : '&#xe055;',
			'icon-imagesrss' : '&#xe056;',
			'icon-imagessearch' : '&#xe057;',
			'icon-imagesuser-5' : '&#xe058;',
			'icon-imagesusers-2' : '&#xe059;',
			'icon-imagesvcard' : '&#xe05a;',
			'icon-imagesmobile-4' : '&#xe05b;',
			'icon-imagesmail' : '&#xe05c;',
			'icon-imagesskype-2' : '&#xe05d;',
			'icon-imagesarrow-down' : '&#xe05e;',
			'icon-imagesarrow-up' : '&#xe05f;',
			'icon-imagesarrow-down-2' : '&#xe060;',
			'icon-imagesarrow-up-2' : '&#xe061;',
			'icon-imagesphone-2' : '&#xe062;',
			'icon-imageslinkedin' : '&#xe063;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-images[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};