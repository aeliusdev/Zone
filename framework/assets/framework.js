$ = jQuery.noConflict();

$(window).load(function() 
{
	$(".zone-element-select").change(function () 
	{
		var actual = $(this).find(":selected").text(),
		display = $(this).find(".zone-element-select-cover span");
				
		display.html(actual);
	}).change();
	
	$(".zone-element-select-cover").on("click", function () 
	{
		return false;
	});
		
	$(".zone-layout-customizer-previews li").each(function () 
	{
		if( $(this).closest(".zone-customizer-element").find("input").val() == $(this).attr("id") )
		{
			$(this).addClass("active");			
		}
	});
		
	$("body").on("click", ".zone-layout-customizer-previews li", function () 
	{
		$(".zone-layout-customizer-previews li").removeClass("active");
		$(this).addClass("active");
				
		$(this).closest(".zone-customizer-element").find("input").val($(this).attr("id"));
		
		$(this).closest(".zone-customizer-element").find("input").trigger("change");

		return false;
	});
	
});