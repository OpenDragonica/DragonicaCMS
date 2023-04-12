<?php 
if (isset($_GET['edit'])){
		if (isset($_GET['news'])){
			$news_select= News_INFO($_GET["news"]);
			$news_id=$news_select['id'];
			$checkNews=checkExistNews($news_id);
			if ($checkNews[0] == 1){
				$canedit=1;
			}
			else if ($checkNews[0] == 0){
			header("location:$lpanel?edit");
			}
		}
}
if(!((isset($_GET['edit']))or(isset($_GET['post'])))):?>
<center>
    <div class="clear10"></div>
    <a  href="<?php echo "$lpanel?post" ?>"><button>Ajouter une news</button></a> - 
    <a  href="<?php echo "$lpanel?edit" ?>"><button>Editer une news</button></a>
    <div class="clear10"></div>
    <a  href="<?php echo $lgm_clear ?>"><button>Retour</button></a>
</center>
<?php endif;
@include('admin/news_Add_form.php'); 
@include('admin/news_Edit_form.php'); 
?>