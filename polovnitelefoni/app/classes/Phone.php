<?php
include_once(__DIR__ . '/Ad.php');
include_once(__DIR__ . '/../exceptions/adExceptions.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


class Phone extends Ad{
    public $accessories;

    public function __construct($user_id = null, $brand = null, $model = null, $title = null, $state = null, $stateRange = null ,$description = null, $images = null, $price = null, $new_price = null, $views = null, $availability = null, $damage = null, $accessories = null) {
        
        parent::__construct($user_id, $brand, $model, $title, $state, $stateRange ,$description, $images, $price, $new_price, $views, $availability, $damage);

        $this->accessories = $accessories;
    }

    public function create($user_id, $brand, $model, $title, $state, $stateRange ,$description, $price, $images, $availability, $damage, $accessories){
        try{
            $sql = "INSERT INTO oglasi (user_id, brand, model, title, state, stateRange, description, price, images, availability, damage, accessories)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->con->prepare($sql);
                if (!$stmt) {
                die('Error in SQL query: ' . $this->con->error);
            }
            $imageFolder = $this->createImageFolder($user_id);
            $isVerified = 1;
            $deal = NULL;
            $newPrice = empty($price) ? $deal : $price;
            $stmt->bind_param("isssssssssss", $user_id, $brand, $model, $title, $state, $stateRange ,$description, $newPrice, $imageFolder, $isVerified, $damage, $accessories);

            $result = $stmt->execute();
            $result = $stmt->affected_rows;

            $imagesUploaded = $this->saveImages('../../uploads/' . $imageFolder, $images, $user_id);
            
            return $imagesUploaded && ($result > 0 ? true : false);
        }catch(Exception $e){
            throw new AD_CANNOT_BE_CREATED();
        }
    }

    public function createImageFolder($user_id){
        $folderName = uniqid($user_id."_");
        $uploadDirectory = '../../uploads/' . $folderName;
        mkdir($uploadDirectory, 0777, true);
        return $folderName;
    }
    

    public function saveImages($uploadDirectory, $imageSrcArray, $user_id){
        try{
            $brojac = 0;
            foreach ($imageSrcArray as $key => $imageSrc) {
                $base64String = $imageSrc;
                list($type, $data) = explode(';', $base64String);
                list(, $data) = explode(',', $data);
    
                $imageData = base64_decode($data);
                if($brojac === 0){
                    $imageName = 'mainimage.png';
                }else{
                    $imageName = uniqid('image_' . $brojac . '_') . '.png';
                }
                $targetFile = $uploadDirectory . '/' . $imageName;
                file_put_contents($targetFile, $imageData);
                $brojac++;
            }
            return true;
        } catch (Exception $e) {
            throw new IMAGES_NOT_SAVED();
        }
    }
    public function select24($offset = 0, $limit = 24){
        try{
            $sql = "SELECT * FROM oglasi LIMIT $limit OFFSET $offset";
            $result = $this->con->query($sql);
            return json_encode($result->fetch_all(MYSQLI_ASSOC));
        }
        catch(Exception $e){
            throw new ADS_NOT_SELECTED();
        }
    }

    public function select24UserAds($user_id, $offset = 0, $limit = 24){
        try{
            $sql = "SELECT * FROM oglasi WHERE user_id=? LIMIT $limit OFFSET $offset";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
        catch(Exception $e){
            throw new ADS_NOT_SELECTED();
        }
    }
    
    public function read($ad_id){
        try{
            $sql = "SELECT * FROM oglasi WHERE ad_id=?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i", $ad_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows === 1)
                return json_encode($result->fetch_assoc());
            return NULL;
        }
        catch(Exception $e){
            throw new AD_CANNOT_BE_READ();
        }
    }
    public function checkVisit($ip, $ad_id){
        try{
            $sql = "SELECT * FROM visitors WHERE ip_address=? AND ad_id=?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("si", $ip, $ad_id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->num_rows == 0 ? true : false;
        }
        catch(Exception $e){
            throw new CHECK_VISIT_ERROR();
        }
    }

    public function addVisit($ip, $ad_id){
        try{
            if($this->checkVisit($ip, $ad_id)){
                $sql = "INSERT INTO visitors (ip_address, ad_id) 
                    VALUES (?,?)";

                $stmt = $this->con->prepare($sql);
                $stmt->bind_param("si", $ip, $ad_id);

                $stmt->execute();
                $results = $stmt->affected_rows;
                
                return $results > 0 ? true : false;
            }
            return false;
        }
        catch(Exception $e){
            throw new ADD_VISIT_ERROR();
        }
    }

    public function totalVisits($ad_id){
        try{
            $sql = "SELECT COUNT(*) as count FROM visitors WHERE ad_id=?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i", $ad_id); 
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            return $row['count'];
        }
        catch(Exception $e){
            throw new TOTAL_VISIT_ERROR();
        }
    }
    public function countSaves($ad_id){
        try{
            $sql = "SELECT COUNT(*) as count FROM sacuvani_oglasi WHERE ad_id = ?";
    
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i", $ad_id);
    
            $stmt->execute();
            $result = $stmt->get_result();
    
            if($row = $result->fetch_assoc()) {
                return $row['count'];
            }
            return 0;
        }
        catch(Exception $e){
            throw new COUNT_SAVES_ERROR();
        }
    }public function save($user_id, $ad_id){
        try{
            $sql = "INSERT INTO sacuvani_oglasi (user_id, ad_id) 
            VALUES (?,?)";

            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("ii", $user_id, $ad_id);

            $stmt->execute();
            if ($stmt->error) {
                throw new Exception("SQL execution error: " . $stmt->error);
            }
            $results = $stmt->affected_rows;
                
            return $results > 0 ? true : false;
        }
        catch(Exception $e){
            throw new ADD_CANNOT_BE_SAVED();
        }
    }

    public function deleteSave($user_id, $ad_id){
        try{
            $sql = "DELETE FROM sacuvani_oglasi WHERE user_id = ? AND ad_id = ?";

            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("ii", $user_id, $ad_id);

            $stmt->execute();
            if ($stmt->error) {
                throw new Exception("SQL execution error: " . $stmt->error);
            }
            $results = $stmt->affected_rows;
                
            return $results > 0 ? true : false;
        }
        catch(Exception $e){
            throw new SAVE_CANNOT_BE_DELETED();
        }
    }
    public function filter($sort = null, $brands = null, $models = null, $minPrice = null, $maxPrice = null, $new = false, $used = false, $damaged = false, $offset = 0, $limit = 24) {
        try {
            if($sort !== null && $sort == 0){
                $sql = "SELECT o.*, COUNT(so.ad_id) AS broj_sacuvanih 
                FROM oglasi o LEFT JOIN sacuvani_oglasi so 
                ON o.ad_id = so.ad_id WHERE 1";
            }else{
                $sql = "SELECT * FROM oglasi WHERE 1";
            }

            $models = json_decode(urldecode($models), true);
            if ($brands !== null && !empty($brands)) {
                $brandConditions = [];
                $brandsArray = explode(",", $brands);

                $insertedBrands = [];
                $br = 0;
                $brandWithModels = [];
                foreach ($brandsArray as $brand) {
                    $exist = 0;
                    if ($models !== null && !empty($models)) {
                        for($i = 0; $i < count($models); $i++){
                            if(in_array($brand, $models[$i])){
                                $model = $models[$i]['model'];
                                $brandConditions[] = "(brand = '$brand' AND model = '$model')";
                                $exist = 1;
                            }
                        }
                    }
                    $brandWithModels[$br] = $exist;
                    if($brandWithModels[$br] == 0){
                        $insertedBrands[] = "'".$brand ."'";
                    }
                    $br++;
                }
                $insertedBrands = array_unique($insertedBrands);
                if(!empty($models) && !empty($insertedBrands)) {
                    $sql .= " AND (" . implode(" OR ", $brandConditions) . ")" . " OR brand IN (" . implode(", ", $insertedBrands) .')';
                }else if(empty($models) && !empty($insertedBrands)) {
                    $sql .= " AND brand IN (" . implode(", ", $insertedBrands) .')';
                }else if(!empty($models) && empty($insertedBrands)) {
                    $sql .= " AND (" . implode(" OR ", $brandConditions) . ")";
                }
            }
    
            if ($minPrice !== null) {
                $sql .= " AND (price >= $minPrice OR price IS NULL)";
            }
    
            if ($maxPrice !== null) {
                $sql .= " AND (price <= $maxPrice OR price IS NULL)";
            }
    
            if ($new && !$used && !$damaged) {
                $sql .= " AND state = 1"; // novi
            } elseif (!$new && $used && !$damaged) {
                $sql .= " AND state = 0"; // polovni
            } elseif (!$new && !$used && $damaged) {
                $sql .= " AND damage IS NOT NULL"; // osteceni
            } elseif ($new && $used && !$damaged) {
                $sql .= " AND (state = 1 OR state = 0)"; // novi i korisceni
            } elseif ($new && !$used && $damaged) {
                $sql .= " AND (state = 1 OR damage IS NOT NULL)"; // novi i osteceni
            } elseif (!$new && $used && $damaged) {
                $sql .= " AND (state = 0 OR damage IS NOT NULL)"; // polovni i osteceni
            } elseif ($new && $used && $damaged) {
                $sql .= " AND (state = 1 OR state = 0 OR damage IS NOT NULL)"; // svi
            }

            if($sort !== null){
                if($sort == 0){
                    $sql .= 'GROUP BY o.ad_id 
                    ORDER BY broj_sacuvanih DESC';
                }else if($sort == 1){
                    $sql .= " ORDER BY creation_date DESC";
                }else if($sort == 2){
                    $sql .= " ORDER BY price ASC";
                }else if($sort == 3){
                    $sql .= " ORDER BY price DESC";
                }
            }
    
            $sql .= " LIMIT $limit OFFSET $offset";
            $result = $this->con->query($sql);
            // echo $sql;
            if (!$result) {
                throw new Exception("Database error: " . $this->con->error);
            }
    
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new FILTERS_ERROR();
        }
    }
}