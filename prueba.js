$(function () {
	$("#myList a").click(function()
		{
			$('#myList a').removeClass('active');
			$(this).addClass('active');
			$("div.tab-content div").hide();
			var activetab = $(this).attr('href');
			$(activetab).show();
			return false;
		});
  });