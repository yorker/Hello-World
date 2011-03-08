<?php
/**
 * Draw stock : amount-high-low-end price graph
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

# left y scale data
if(!$this->scale['values'])
{
	$l_start_value = $l_end_value = $this->data[0][0];
	for($i = 1; $i < count($this->data); $i++)
	{
		$l_start_value = $l_start_value > $this->data[$i][0] ? $this->data[$i][0] : $l_start_value;
		$l_end_value = $l_end_value < $this->data[$i][0] ? $this->data[$i][0] : $l_end_value;
	}
	$l_field_number = 6;
	$l_data_unit = ($l_end_value - $l_start_value) / ($l_field_number - 1);
	for($i = 0; $i < $l_field_number; $i++)
	{
		$this->scale['values'][0][] = ceil($l_start_value + $l_data_unit * $i);
	}
}
else
{
	$l_field_number = count($this->scale['values'][0]);
}

# right y scale data
if(!$this->scale['values'])
{
	$r_start_value = $this->data[0][2];
	$r_end_value = $this->data[0][1];
	for($i = 1; $i < count($this->data); $i++)
	{
		$r_start_value = $r_start_value > $this->data[$i][2] ? $this->data[$i][2] : $r_start_value;
		$r_end_value = $r_end_value < $this->data[$i][1] ? $this->data[$i][1] : $r_end_value;
	}
	$r_field_number = 6;
	$r_data_unit = ($r_end_value - $r_start_value) / ($r_field_number - 1);
	for($i = 0; $i < $r_field_number; $i++)
	{
		$this->scale['values'][1][] = ceil($r_start_value + $r_data_unit * $i);
	}
}
else
{
	$r_field_number = count($this->scale['values'][1]);
}


$unitx = $w / count($this->data);
$column_width = $unitx * (1 - 2 * $gap);
$column_gap = $unitx * $gap;
$l_unity = $h / ($l_field_number - 1);
$r_unity = $h / ($r_field_number - 1);

$startx = $posx + strlen((string) max($this->scale['values'][0])) * $this->desc['size'];
$starty = $posy + $h;

# draw left y scale
for($i = 0; $i < $l_field_number; $i++)
{
	# line
	imageline($this->chart, $startx, $starty - $l_unity * $i, $startx + $w, $starty - $l_unity * $i, $scale_color);
	# sign
	imageline($this->chart, $startx, $starty - $l_unity * $i, $startx + 5, $starty - $l_unity * $i, $border_color);
	# value
	imagettftext($this->chart, $this->desc['size'], $this->desc['angle'], $posx, $starty - $l_unity * $i, $value_font_color, $this->desc['font'], $this->scale['values'][0][$i]);
}

# draw right y scale
for($i = 0; $i < $r_field_number; $i++)
{
	# sign
	imageline($this->chart, $startx + $w - 5, $starty - $r_unity * $i, $startx + $w, $starty - $r_unity * $i, $border_color);
	# value
	imagettftext($this->chart, $this->desc['size'], $this->desc['angle'], $startx + $w + 5, $starty - $r_unity * $i, $value_font_color, $this->desc['font'], $this->scale['values'][1][$i]);
}

# draw x scale if keys is set
if($this->scale['keys'])
{
	$keys_number = count($this->scale['keys']);
	$unitkey = $w / $keys_number;
	$key_offset = 0;
	for($i = 0; $i < $keys_number; $i++)
	{
		# sign
		imageline($this->chart, $startx + $unitkey * $i, $starty, $startx + $unitkey * $i, $starty - 5, $border_color);
		# key
		$key_offset = ($unitx - strlen((string) max($this->scale['keys'])) * $this->desc['size']) / 2;
		imagettftext($this->chart, $this->desc['size'], $this->desc['angle'], $startx + $unitkey * $i + $key_offset, $starty + $this->desc['size'] + 2, $key_font_color, $this->desc['font'], $this->scale['keys'][$i]);
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
	$l_y_field = 0;
	for($j = 0; $j < $l_field_number - 1; $j++)
	{
		if($this->data[$i][0] > $this->scale['values'][0][$j] && $this->data[$i][0] <= $this->scale['values'][0][$j + 1])
		{
			$l_y_field = $j;
			break;
		}
	}
	$columny = $starty - $l_unity * ($l_y_field + ($this->data[$i][0] - $this->scale['values'][0][$l_y_field]) / ($this->scale['values'][0][$l_y_field + 1] - $this->scale['values'][0][$l_y_field]));
	# fill column
	imagefilledrectangle($this->chart, $columnx, $columny, $columnx + $column_width, $starty - 1, $scale_color);
	# column border
	imageline($this->chart, $columnx, $starty - 1, $columnx, $columny, $border_color);
	imageline($this->chart, $columnx, $columny, $columnx + $column_width, $columny, $border_color);
	imageline($this->chart, $columnx + $column_width, $columny, $columnx + $column_width, $starty - 1, $border_color);
}

# draw lines
imagesetthickness($this->chart, $this->graph['shadow'] * 10 * 2);
for($i = 0; $i < count($this->data); $i++)
{
	$linex = $startx + $unitx * ($i + 0.5);
	
	$y_high_field = $y_low_field = $y_end_field = 0;
	for($j = 0; $j < $r_field_number - 1; $j++)
	{
		if(!$y_high_field && $this->data[$i][1] > $this->scale['values'][1][$j] && $this->data[$i][1] <= $this->scale['values'][1][$j + 1])
		{
			$y_high_field = $j;
		}
		if(!$y_low_field && $this->data[$i][2] > $this->scale['values'][1][$j] && $this->data[$i][2] <= $this->scale['values'][1][$j + 1])
		{
			$y_low_field = $j;
		}
		if(!$y_end_field && $this->data[$i][3] > $this->scale['values'][1][$j] && $this->data[$i][3] <= $this->scale['values'][1][$j + 1])
		{
			$y_end_field = $j;
		}
	}
	$y_high = $starty - $r_unity * ($y_high_field + ($this->data[$i][1] - $this->scale['values'][1][$y_high_field]) / ($this->scale['values'][1][$y_high_field + 1] - $this->scale['values'][1][$y_high_field]));
	$y_low = $starty - $r_unity * ($y_low_field + ($this->data[$i][2] - $this->scale['values'][1][$y_low_field]) / ($this->scale['values'][1][$y_low_field + 1] - $this->scale['values'][1][$y_low_field]));
	$y_end = $starty - $r_unity * ($y_end_field + ($this->data[$i][3] - $this->scale['values'][1][$y_end_field]) / ($this->scale['values'][1][$y_end_field + 1] - $this->scale['values'][1][$y_end_field]));
	# draw line
	imageline($this->chart, $linex, $y_low, $linex, $y_high, $border_color);
	imageline($this->chart, $linex, $y_end, $linex + 4, $y_end, $border_color);
}
?>