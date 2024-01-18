<?php
class ObligationController
{
    private $obligationDao;
    public function __construct(ObligationDao $obligationDao)
    {
        $this->obligationDao = $obligationDao;
    }

    public function index()
    {
        $obligations = $this->obligationDao->getAll();
        return $obligations;
    }

    public function createFromForm()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $description = $_POST["description"];
            $start = $_POST["start"];
            $end = $_POST["end"];

            // Validazione dei dati (puoi aggiungere ulteriori controlli qui)
            if (empty($name)) {
                echo "Il nome è obbligatorio.";
                return;
            }

            // Crea un'istanza di Obligation con i dati del form
            $obligation = new Obligation($name, $description, $start, $end);

            // Chiama il metodo create del DAO per salvare l'obbligo nel database
            $this->obligationDao->create($obligation);

            // Puoi anche reindirizzare l'utente a una pagina di conferma o altrove
            header("Location: index.php");
            exit();
        }
    }

    public function getById($id)
    {
        return $this->obligationDao->getById($id);
    }


    public function update($data)
    {
        $id = $data['id'];

        // Recupera l'obbligo esistente
        $existingObligation = $this->obligationDao->getById($id);

        // Verifica se l'obbligo esiste prima di procedere con l'aggiornamento
        if ($existingObligation) {
            $name = $data["name"];
            $description = $data["description"];
            $start = $data["start"];
            $end = $data["end"];

            // Crea un'istanza di Obligation
            $updatedObligation = new Obligation($name, $description, $start, $end);
            $this->obligationDao->update($updatedObligation, $id);
            header("Location: index.php");
        } else {
            echo "Obligation not found.";
        }
        exit();
    }
    public function delete($id)
    {
        $this->obligationDao->delete($id);
        header("Location: index.php");
    }
}