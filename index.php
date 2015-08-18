<?php
namespace index;

$FileName=<<<EONAME
head.html
EONAME;

$OutputFileName=<<<EONAME
output.html
EONAME;


$str['Target'] = array('<link' => '/>' );
$i=0;
foreach ($str['Target'] as $key => $value) 
{
	$str['TargetArray'][$i]['Start']=str_split($key);
	$str['TargetArray'][$i]['End']=str_split($value);
	$i++;
}


$handle=fopen($FileName, 'r+');
$FileSize=filesize($FileName);
$content= fread($handle,$FileSize);
$str['Material']= str_split($content);

$i=0; //i is used as number of target array.

$length=count($str['TargetArray'][$i]['Start']);
for ($k=0; $k <$FileSize ; $k++) 	//k is used as a cursor of material string.
{
	if ($str['TargetArray'][$i]['Start'][0]==$str['Material'][$k]) 	
	{
		$condition=1;
		$j=1;		//j is used as a cursor of target string.
		while($condition and ($j < $length) )
		{ 
			if ($str['TargetArray'][$i]['Start'][$j]==$str['Material'][$k+$j]) 
			{
				$condition=1;
			}else
			{
				$condition=0;
			}
			$j++;
		}
		if ($condition==1) 		//tag found
		{/*
			for ($l=0; $l < $length; $l++) 
			{ 
				echo $str['Material'][$k+$l];
			}
			echo " tag found \n"; */
		}elseif($condition==0)		//similar tag found
		{/*
			for ($l=0; $l < $j; $l++) 
			{ 
				echo $str['Material'][$k+$l];
			}
			echo " similar tag found \n";*/
		}else  		//error
		{
			//echo 'error<br>';
		}
	}
}
//print_r($str);
?>
<?php echo '$data';?>
