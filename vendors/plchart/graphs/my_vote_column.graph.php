<?php
/**
 * Draw my vote column graph
 */
 
if(!$this->data){return false;}

$gap = 0.2;
$w = $this->graph['width'];
$h = $this->graph['height'];
$unitx = $w / count($this->data);
$column_width = $unitx * (1 - 2 * $gap);
$column_gap = $unitx * $gap;

imagesetthickness($this->chart, $this->graph['shadow'] * 10);

$border_color = $this->colors['list'][0];
$top_color = $this->colors['list'][1];
$left_color = $this->colors['list'][2];
$right_color = $this->colors['list'][3];
$font_color = $this->colors['list'][4];

# 3D shadow
$shadow = ceil($column_width / 3);
$max_value = max($this->data);

# coordinate origin
$posx = $this->graph['posx'];
$posy = $this->graph['posy'];
$startx = $posx;
$starty = $posy + $h;

# draw columns
for($i = 0; $i < count($this->data); $i++)
{
	$columnx = $startx + $unitx * $i + $column_gap;
	$columny = $posy + ceil($h * (1 - $this->data[$i] / $max_value));
	# data
	imagettftext($this->chart, $this->desc['size'], $this->desc['angle'], $columnx, $columny - $this->desc['size'] / 2, $font_color, $this->desc['font'], $this->data[$i]);
	# x scale
	imagettftext($this->chart, $this->desc['size'], $this->desc['angle'], $columnx, $starty + $this->desc['size'] + 2, $font_color, $this->desc['font'], $this->scale['keys'][$i]);
	# top
	imagefilledpolygon($this->chart, array($columnx, $columny + $shadow, $columnx + $column_width / 2, $columny, $columnx + $column_width, $columny + $shadow, $columnx + $column_width / 2, $columny + $shadow * 2), 4, $top_color);
	# left
	imagefilledpolygon($this->chart, array($columnx, $columny + $shadow, $columnx + $column_width / 2, $columny + $shadow * 2, $columnx + $column_width / 2, $starty, $columnx, $starty - $shadow), 4, $left_color);
	# right
	imagefilledpolygon($this->chart, array($columnx + $column_width / 2, $columny + $shadow * 2, $columnx + $column_width, $columny + $shadow, $columnx + $column_width, $starty - $shadow, $columnx + $column_width / 2, $starty), 4, $right_color);

	# column border
	imagesmoothline($this->chart, $columnx, $columny + $shadow, $columnx + $column_width / 2, $columny, $border_color);
	imagesmoothline($this->chart, $columnx + $column_width / 2, $columny, $columnx + $column_width, $columny + $shadow, $border_color);
	imageline($this->chart, $columnx + $column_width, $columny + $shadow, $columnx + $column_width, $starty - $shadow, $border_color);
	imagesmoothline($this->chart, $columnx + $column_width, $starty - $shadow, $columnx + $column_width / 2, $starty, $border_color);
	imagesmoothline($this->chart, $columnx + $column_width / 2, $starty, $columnx, $starty - $shadow, $border_color);
	imageline($this->chart, $columnx, $columny + $shadow, $columnx, $starty - $shadow, $border_color);
}
?>