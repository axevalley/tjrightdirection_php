<?php
ini_set('post_max_size', '200M');
ini_set('upload_max_filesize', '200M');
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/admin/header.php');
$database = new tjrightdirection\Database();
$jobNames = $database->getJobNames();

print_r($jobNames);

if (isset($_FILES['image'])) {
    $jobName = $_POST['job_name'];
    if (array_key_exists($jobName, $jobNames)) {
        $jobID = $jobNames[$jobName];
        $sortNumber = $database->getNextImageNumberForJob($jobNames[$jobName]);
    } else {
        $jobID = $database->addGalleryJob($jobName);
        $sortNumber = 0;
    }

    $image = $_FILES['image']['tmp_name'];
    $filename = uniqid() . '.jpg';
    $filepath = $GALLERY_FULL_PATH . $filename;
    move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
    $fullResize = new tjrightdirection\Gallery\Resize($filepath);
    $fullResize->resizeImage(1000, 1000, 'auto');
    $fullResize->saveImage($filepath, 100);
    $thumbResize = new tjrightdirection\Gallery\Resize($filepath);
    $thumbResize -> resizeImage(200, 200, 'auto');
    $thumbPath = $GALLERY_THUMB_PATH . $filename;
    $thumbResize->saveImage($thumbPath, 100);
    $database->addImageToGallery($filename, $jobID, $sortNumber);
}
?>
<form enctype="multipart/form-data" id='image_upload_form' method="post" >
    <table>
        <tr>
            <td><label for="image">Image</label><td>
            <td><input type="file" accept="image/jpeg" name="image" id="image"></td>
        </tr>
        <tr>
            <td><label for="job_name_new">Job Name</label></td>
            <td><input type="text" name="job_name"></td>
        </tr>
        <tr>
            <td><label for="job_name_old">Existing Job</label></td>
            <td>
                <select name="job_name_old" id="">
                    <option label=" "></option>
                    <?php
                    foreach($jobNames as $job => $jobID) {
                        $jobName = htmlspecialchars($job);
                        echo "<option value=\"{$jobName}\">{$jobName}</option>\n";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name='submit' title='submit' alt='submit' value='Submit'></td>
        </tr>
    </table>


</form>
<?php
require_once($PRIVATE . 'html/admin/footer.php');
