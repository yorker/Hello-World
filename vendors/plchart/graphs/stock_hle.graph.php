<?php
/**
 * Draw stock : high-low-end price graph
 */
 
if(!$this->data){return false;}

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
	$start_value = $this->data[0][1];
	$end_value = $this->data[0][0];
	for($i = 1; $i < count($this->data); $i++)
	{
		$start_value = $start_value > $this->data[$i][1] ? $this->data[$i][1] : $start_value;
		$end_value = $end_value < $this->data[$i][0] ? $this->data[$i][0] : $end_value;
	}
	$field_number = 6;
	$data_unit = ($end_value - $start_value) / ($field_number - 1);
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

# draw lines
imagesetthickness($this->chart, $this->graph['shadow'] * 10 * 2);
for($i = 0; $i < count($this->data); $i++)
{
	$linex = $startx + $unitx * ($i + 0.5);
	
	$y_high_field = $y_low_field = $y_end_field = 0;
	for($j = 0; $j < $field_number - 1; $j++)
	{
		if(!$y_high_field && $this->data[$i][0] > $this->scale['values'][$j] && $this->data[$i][0] <= $this->scale['values'][$j + 1])
		{
			$y_high_field = $j;
		}
		if(!$y_low_field && $this->data[$i][1] > $this->scale['values'][$j] && $this->data[$i][1] <= $this->scale['values'][$j + 1])
		{
			$y_low_field = $j;
		}
		if(!$y_end_field && $this->data[$i][2] > $this->scale['values'][$j] && $this->data[$i][2] <= $this->scale['values'][$j + 1])
		{
			$y_end_field = $j;
		}
	}
	$y_high = $starty - $unity * ($y_high_field + ($this->data[$i][0] - $this->scale['values'][$y_high_field]) / ($this->scale['values'][$y_high_field + 1] - $this->scale['values'][$y_high_field]));
	$y_low = $starty - $unity * ($y_low_field + ($this->data[$i][1] - $this->scale['values'][$y_low_field]) / ($this->scale['values'][$y_low_field + 1] - $this->scale['values'][$y_low_field]));
	$y_end = $starty - $unity * ($y_end_field + ($this->data[$i][2] - $this->scale['values'][$y_end_field]) / ($this->scale['values'][$y_end_field + 1] - $this->scale['values'][$y_end_field]));
	# draw line
	imageline($this->chart, $linex, $y_low, $linex, $y_high, $border_color);
	imageline($this->chart, $linex, $y_end, $linex + 4, $y_end, $border_color);
}	
?>