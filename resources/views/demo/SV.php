<?php
class SV{
	private $mssv;
	private $ten;
	private $dtb;
public function Set($ms,$t,$d){
		$this->mssv=$ms;
		$this->ten=$t;
		$this->dtb=$d; }
public function In()
	{
	echo $this->mssv;
	echo "<br>";
	echo $this->ten;
	echo "<br>";
	echo $this->dtb;
	echo "<br>";
	}
};

$sv1= new SV();
$sv1->Set("001","Nguyễn Xuân Tú",9.5); 
//$sv1->In();
 
$sv1->mssv="009";

print $sv1->mssv;

?>