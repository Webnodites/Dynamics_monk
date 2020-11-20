<?php
			
require_once 'connect.php';

if(isset($_POST["delete_folder"]))
{
	$delid = $_POST['del_id'];
	$delq = "DELETE FROM `gallery` WHERE galleryId= $delid";
	mysqli_query($con,$delq);
	echo "<script>window.location.href='managegallery.php';  </script>";
}	


			$a= "Select * from `gallery`";
			$res1 = mysqli_query($con,$a);
			
			$index = 0;
			if(!empty($res1))
			{
			foreach ($res1 as $gal) {
				$index++;
			?>
				<tr>
				<td><?php echo $index; ?></td>
		        <td><?php echo $gal['folderName']; ?></td>
                <td><img src="../images/folder/<?php echo $gal['foldermainimg']; ?>"/></td>
                <td><a href="gallery_images.php?fid=<?php echo $gal['galleryId']; ?>">View/Edit</a></td>
		       
		        <td> <a href="editfolder.php?fid=<?php echo $gal['galleryId']; ?>">Edit</a> | 
                    <a id="" class="delete_folder" onclick="deletefunc(this)" data-id="<?php echo $gal['galleryId']; ?>" >Delete</a>
                </td>
		        </tr>
				<?php
					}
				
			} else {
				
				?>
		        <tr>
		        <td colspan="4">No Products Found</td>
		        </tr>
		        <?php
				
			}
			?>