
<?php
class Pager{
	private $_totalItem; // tong so sp
	private $_nItemOnPage; // so sp tren 1 trang
	private $_nPageShow ; // so trang hien thi
	private $_totalPage; // tong so trang
    private $_currentPage; // trang hien tai
	
	/**
	 * gan gia tri cho cac thuoc tinh
	 */
	public function __construct(int $totalItem, int $currentPage = 1,$nItemOnPage = 5,$nPageShow = 5){
		$this->_totalItem 	= $totalItem;
		$this->_nItemOnPage	= $nItemOnPage;
		if ($nPageShow%2==0) {
			$nPageShow 		= $nPageShow + 1;
		}
		$this->_nPageShow 	= $nPageShow;
		$this->_currentPage = abs($currentPage);
		$this->_totalPage  	= ceil($totalItem/$nItemOnPage);  
	}
	public function showPagination(){
        $paginationHTML 	= '';
		if($this->_totalPage > 1){
			$actual_link = ($_SERVER['REQUEST_SCHEME']=='http' ? "http" : "https") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

			$arr = explode('/', $actual_link); // string to array
			// if( is_numeric($arr[count($arr)-1]) ){
			// 	unset($arr[count($arr)-1]); // remove last item of array
			// }
			unset($arr[count($arr)-1]); // remove last item of array


			$actual_link  = implode('/',$arr); // array to string
			
			$start 	= ''; 
			$prev 	= ''; 
			if($this->_currentPage > 1){
                $start 	= "<li><a href='$actual_link/1'>Start</a></li>";
				$prev 	= "<li><a href='$actual_link/".($this->_currentPage-1)."'>«</a></li>";
            }
            
			$next 	= ''; 
			$end 	= ''; 
			if($this->_currentPage < $this->_totalPage){
				$next 	= "<li><a href='$actual_link/".($this->_currentPage+1)."'>»</a></li>";
				$end 	= "<li><a href='$actual_link/".$this->_totalPage."'>End</a></li>";
			}
		
			$startPage		= 1;
			$endPage		= $this->_totalPage;
			// 10 
			// 5
			if($this->_nPageShow < $this->_totalPage){
				if($this->_currentPage == 1 ){
					$startPage 	= 1;
					$endPage 	= $this->_nPageShow;
                }
                else if($this->_currentPage == $this->_totalPage){
                    $startPage 	= $this->_totalPage - $this->_nPageShow + 1;
					$endPage 	= $this->_totalPage;
                }
				else{
					$startPage		= $this->_currentPage - ($this->_nPageShow-1)/2;
					$endPage		= $this->_currentPage + ($this->_nPageShow-1)/2;

					if($startPage < 1){
						$endPage	= $endPage + 1; 
						$startPage 	= 1; 
					}
					if($endPage > $this->_totalPage){
						$endPage	= $this->_totalPage;
						$startPage 	= $endPage - $this->_nPageShow + 1;
						// $startPage 	= $startPage - 1;

					}
				}
			}
			$listPages = '';
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->_currentPage) {
					$listPages .= "<li><a class='active'>".$i.'</a>';
				}
				else{
					$listPages .= "<li><a href='$actual_link/".$i."'>".$i.'</a>';
				}
			}
			$paginationHTML = '<ul>'.$start.$prev.$listPages.$next.$end.'</ul>';
		}
		return $paginationHTML;
	}
}
