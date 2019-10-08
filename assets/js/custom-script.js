/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

jQuery.fn.extend({
	createRepeater: function () {
		var addItem = function (items, key) {
			var itemContent = items;
			var group = itemContent.data("group");
			var item = itemContent;
			var input = item.find('input,select');
			input.each(function (index, el) {
				var attrName = $(el).data('name');
				var skipName = $(el).data('skip-name');
				if (skipName != true) {
					$(el).attr("name", group + "[" + key + "]" + attrName);
				} else {
					if (attrName != 'undefined') {
						$(el).attr("name", attrName);
					}
				}
			})
			var itemClone = items;

			/* Handling remove btn */
			var removeButton = itemClone.find('.remove-btn');

			if (key == 0) {
				removeButton.attr('disabled', true);
			} else {
				removeButton.attr('disabled', false);
			}

			$("<div class='items'>" + itemClone.html() + "<div/>").appendTo(repeater);
		};
		/* find elements */
		var repeater = this;
		var items = repeater.find(".items");
		var key = 0;
		var addButton = repeater.find('.repeater-add-btn');
		var newItem = items;

		if (key == 0) {
			items.remove();
			addItem(newItem, key);
		}

		/* handle click and add items */
		addButton.on("click", function () {
			key++;
			addItem(newItem, key);
		});
	}
});

$(document).ready(function() {
	$("#repeater").createRepeater()
	$('#pengiriman-tables').DataTable()
	$('#pemesanan-tables').DataTable()
	$('#penawaran-tables').DataTable()
	$('#faktur-tables').DataTable()
})