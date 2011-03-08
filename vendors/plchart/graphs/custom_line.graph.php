<?php
/**
 * Draw custom line graph
 */
 
if(!$this->data){return false;}

$posx = $this->graph['posx'];
$posy = $this->graph['posy'];
$w = $this->graph['width'];
$h = $this->graph['height'];
$c_w = 0.4;
$c_c_w = 0.2;

imagesetthickness($this->chart, $this->graph['shadow'] * 10);

$border_color = $this->colors['list'][6];
$scale_color = $this->colors['list'][6];
$value_font_color = $this->colors['list'][17];
$key_font_color = $this->colors['list'][17];
$dot_color = $this->colors['list'][1];
$line_color = $this->colors['list'][11];

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

$unitx = $w / (count($this->data) - 1);
$unity = $h / ($field_number - 1);
$c_width = $unitx * $c_w;
$c_c_width = $unitx * $c_c_w;

$startx = $posx + strlen((string) max($this->scale['values'])) * $this->desc['size'];
$starty = $posy + $h;

# draw y scale
for($i = 0; $i < $field_number; $i++)
{
	# sign
	imageline($this->chart, $startx, $starty - $unity * $i, $startx + 5, $starty - $unity * $i, $border_color);
	# value
	imagettftext($this->chart, $this->desc['size'], $this->desc['angle'], $posx, $starty - $unity * $i, $value_font_color, $this->desc['font'], $this->scale['values'][$i]);
}

# draw x scale if keys is set
if($this->scale['keys'])
{
	$keys_number = count($this->scale['keys']);
	$unitkey = $w / ($keys_number - 1);
	for($i = 0; $i < $keys_number; $i++)
	{
		# key
		imagettftext($this->chart, $this->desc['size'], $this->desc['angle'], $startx + $unitkey * $i, $starty + $this->desc['size'] + 2, $key_font_color, $this->desc['font'], $this->scale['keys'][$i]);
	}
}

# graph border
imageline($this->chart, $startx, $starty, $startx + $w + $c_width, $starty, $border_color);
imageline($this->chart, $startx, $starty, $startx, $posy, $border_color);

$startx += $c_width / 2;
# get dots data
$dots_pos = array();
for($i = 0; $i < count($this->data); $i++)
{
	$dotx = $startx + $unitx * $i;
	$dots_pos[] = $dotx;
	
	$dot_field = 0;
	for($j = 0; $j < $field_number - 1; $j++)
	{
		if($this->data[$i] > $this->scale['values'][$j] && $this->data[$i] <= $this->scale['values'][$j + 1])
		{
			$dot_field = $j;
			break;
		}
	}
	$doty = $starty - $unity * ($dot_field + ($this->data[$i] - $this->scale['values'][$dot_field]) / ($this->scale['values'][$dot_field + 1] - $this->scale['values'][$dot_field]));
	$dots_pos[] = $doty;
}

imagesetthickness($this->chart, $unitx * ($c_w - $c_c_w) / 2);
# draw line
for($i = 0; $i < count($dots_pos) - 3; $i += 2)
{
	imageline($this->chart, $dots_pos[$i], $dots_pos[$i + 1], $dots_pos[$i + 2], $dots_pos[$i + 3], $line_color);
}

# draw dots
for($i = 0; $i < count($this->data); $i++)
{
	# draw dot
	imagefilledellipse($this->chart, $dots_pos[$i * 2], $dots_pos[$i * 2 + 1], $c_width, $c_width, $line_color);
	imagefilledellipse($this->chart, $dots_pos[$i * 2], $dots_pos[$i * 2 + 1], $c_c_width, $c_c_width, $dot_color);
}
?>