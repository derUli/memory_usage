<h2 class="accordion-header"><?php
translate ( "memory_usage" );
?></h2>
<div class="accordion-content">
	<table>
		<tr>
			<td><strong><?php translate("memory_limit")?></strong></td>
			<td class="text-right"><?php Template::escape(ViewBag::get("memory_limit"));?></td>
		</tr>
		<tr>
			<td><strong><?php translate("memory_used");?></strong></td>
			<td class="text-right"><?php Template::escape(ViewBag::get("memory_used"));?></td>
		</tr>
	</table>
	<div style="margin-top:15px; <?php Template::escape(ViewBag::get("percent_color"));?>; padding:5px 10px 5px 10px; border: 1px solid black; min-width:50px; font-size: 14px; max-width:100%; width:<?php Template::escape(ViewBag::get("percent"));?>%"><?php Template::escape(ViewBag::get("percent"));?> %

</div>
</div>