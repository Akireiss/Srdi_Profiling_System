<?php
error_reporting(0);
session_start();

class db
{
    public $con;

    public function __construct()
    {
        $this->con = mysqli_connect('localhost', 'root', '', 'profiling_system') or die(mysqli_error());
    }

    public function removeFile($fileId, $fileType)
    {
        $fileId = mysqli_real_escape_string($this->con, $fileId);

        // Determine the column name based on the file type
        switch ($fileType) {
            case 'image':
                $columnName = 'id_pic';
                break;

            case 'pdf':
                $columnName = 'intent';
                break;

            case 'signature':
                $columnName = 'signature';
                break;

            case 'bypic':
                $columnName = 'bypic';
                break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid file type']);
                return;
        }

        $filePath = "../uploads/" . $fileId . "." . strtolower($fileType);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $query = "UPDATE cocoon SET $columnName = NULL WHERE cocoon_id = '$fileId'";
        $result = mysqli_query($this->con, $query);

        return $result;
    }
}

$db = new db();

if (isset($_POST['file_id']) && isset($_POST['file_type'])) {
    $fileId = $_POST['file_id'];
    $fileType = $_POST['file_type'];

    function removeFile($db, $fileId, $fileType)
    {
        $result = $db->removeFile($fileId, $fileType);

        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update the database']);
        }
    }

    removeFile($db, $fileId, $fileType);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
