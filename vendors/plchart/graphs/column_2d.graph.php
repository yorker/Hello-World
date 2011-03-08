<?php
/**
 * Draw 2D column graph
 */
 
if(!$this->data){return false;}

$gap = 0.2;
$posx = $this->graph['posx'];
$posy = $this->graph['posy'];
$w = $this->graph['width'];
$h = $this->graph['height'];

imagesetthickness($this->chart, $this->graph['shadow'] * 10);

$border_color = $this->colors['list'][0];
$scale_color = $this->colors['list'][1];
$value_font_color = $this->colors['list'][2];
$key_font_color = $this->colors['list'][3];

# y scale data
if(!$this->scale['values'])
{
	$start_value = min($this->data);
	$field_number = 6;
	$data_unit = (max($this->data) - $start_value) / ($field_number - 1);
	for($i = 0; $i < $field_number; $i++)
	{
		$this->scale['values'][] = ceil($start_value + $data_unit * $i);
	}
}
else
{
	$field_number = count($this->scale['values']);
}

$unitx = $w / count($this->data);
$unity = $h / ($field_number - 1);
$column_width = $unitx * (1 - 2 * $gap);
$column_gap = $unitx * $gap;

$startx = $posx + strlen((string) max($this->scale['values'])) * $this->desc['size'];
$starty = $posy + $h;

# draw y scale
for($i = 0; $i < $field_number; $i++)
{
	# line
	imageline($this->chart, $startx, $starty - $unity * $i, $startx + $w, $starty - $unity * $i, $scale_color);
	# sign
	imageline($this->chart, $startx, $starty - $unity * $i, $startx + 5, $starty - $unity * $i, $border_color);
	# value
	imagettftext($this->chart, $this->desc['size'], $this->desc['angle'], $posx, $starty - $unity * $i, $value_font_color, $this->desc['font'], $this->scale['values'][$i]);
}

# draw x scale if keys is set
if($this->scale['keys'])
{
	$keys_number = count($this->scale['keys']);
	$unitkey = $w / $keys_number;
	for($i = 0; $i < $keys_number; $i++)
	{
		# sign
		imageline($this->chart, $startx + $unitkey * $i, $starty, $startx + $unitkey * $i, $starty - 5, $border_color);
		# key
		imagettftext($this->chart, $this->desc['size'], $this->desc['angle'], $startx + $unitkey * $i + $column_gap, $starty + $this->desc['size'] + 2, $key_font_color, $this->desc['font'], $this->scale['keys'][$i]);
	}
}

# graph border
imageline($this->chart, $startx, $starty, $startx + $w, $starty, $border_color);
imageline($this->chart, $startx, $starty, $startx, $posy, $border_color);
imageline($this->chart, $startx, $posy, $startx + $w, $posy, $border_color);
imageline($this->chart, $startx + $w, $starty, $startx + $w, $posy, $border_color);

# draw columns
for($i = 0; $i < count($this->data); $i++)
{
	$columnx = $startx + $unitx * $i + $column_gap;
	$y_field = 0;
	for($j = 0; $j < $field_number - 1; $j++)
	{
		if($this->data[$i] > $this->scale['values'][$j] && $this->data[$i] <= $this->scale['values'][$j + 1])
		{
			$y_field = $j;
			break;
		}
	}
	$columny = $starty - $unity * ($y_field + ($this->data[$i] - $this->scale['values'][$y_field]) / ($this->scale['values'][$y_field + 1] - $this->scale['values'][$y_field]));
	# fill column
	imagefilledrectangle($this->chart, $columnx, $columny, $columnx + $column_width, $starty - 1, $this->colors['list'][$i * 2 + 4]);
	# column border
	imageline($this->chart, $columnx, $starty - 1, $columnx, $columny, $border_color);
	imageline($this->chart, $columnx, $columny, $columnx + $column_width, $columny, $border_color);
	imageline($this->chart, $columnx + $column_width, $columny, $columnx + $column_width, $starty - 1, $border_color);
}	
?>