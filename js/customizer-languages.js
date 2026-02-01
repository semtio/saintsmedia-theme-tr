(function($) {
	'use strict';

	function buildItem() {
		return $(
			'<div class="sml-language-item">' +
				'<div class="sml-field">' +
					'<label>Код или название стр.</label>' +
					'<input type="text" class="sml-lang-code" placeholder="en" />' +
				'</div>' +
				'<div class="sml-field">' +
					'<label>Название</label>' +
					'<input type="text" class="sml-lang-name" placeholder="English" />' +
				'</div>' +
				'<button type="button" class="button-link sml-remove" aria-label="Удалить язык">✕</button>' +
			'</div>'
		);
	}

	function sync($control) {
		const $list = $control.find('.sml-languages-list');
		const $input = $control.find('.sml-languages-json');
		const seen = {};
		const languages = [];

		$list.find('.sml-language-item').each(function() {
			const $item = $(this);
			let raw = ($item.find('.sml-lang-code').val() || '').trim();
			let name = ($item.find('.sml-lang-name').val() || '').trim();
			let code = raw.toLowerCase();

			if (code === '.' || code === './') {
				code = '/';
			}
			if (code === '/') {
				$item.find('.sml-lang-code').val('/');
			} else {
				$item.find('.sml-lang-code').val(code);
			}

			if (!code || !name) {
				return;
			}

			let saveCode = code === '/' ? '' : code;

			const seenKey = saveCode === '' ? '__default__' : saveCode;
			if (seen[seenKey]) {
				return;
			}

			seen[seenKey] = true;
			languages.push({ code: saveCode, name: name });
		});

		$input.val(languages.length ? JSON.stringify(languages) : '');
		$input.trigger('change');
	}

	$(document).on('click', '.sml-add', function(e) {
		e.preventDefault();
		const $control = $(this).closest('.customize-control');
		const $list = $control.find('.sml-languages-list');
		const $item = buildItem();
		$list.append($item);
		$item.find('.sml-lang-code').focus();
		sync($control);
	});

	$(document).on('click', '.sml-remove', function(e) {
		e.preventDefault();
		const $control = $(this).closest('.customize-control');
		$(this).closest('.sml-language-item').remove();
		sync($control);
	});

	$(document).on('input', '.sml-lang-code, .sml-lang-name', function() {
		const $control = $(this).closest('.customize-control');
		sync($control);
	});

	$(function() {
		$('.customize-control-saintsmedia-languages').each(function() {
			sync($(this));
		});
	});
})(jQuery);
