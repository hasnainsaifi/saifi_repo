<?php

  class AddCaseModel extends Model {

    private function addCase() {
      if(isset($_POST['submit'])) {
          $case_title = $_POST['case-title'];
          $case_author = $_POST['case-author'];
          $case_body = $_POST['case-body'];
          $patient_name = $_POST['patient-name'];
          $patient_age = $_POST['patient-age'];
          $patient_address = $_POST['patient-address'];
          $infection_date =$_POST['infection-date'];

          $query = "INSERT INTO cases (case_title,  patient_name,	 patient_age,	 patient_address,	infection_date,	case_body,	case_author) VALUES (:title, :name, :age, :address, :infection_date, :description, :author)";

          $stmt = Database::connect()->prepare($query);
          $stmt->execute(array(
            ':title' => $case_title,
            ':name' => $patient_name,
            ':age' => $patient_age,
            ':address' => $patient_address,
            ':infection_date' => $infection_date,
            ':description' => $case_body,
            ':author' => $case_author
                              ));
            header('Location: /covid-19/');
        }
      }

      public function getAddCase() {
        return $this->addCase();
      }
}
?>
