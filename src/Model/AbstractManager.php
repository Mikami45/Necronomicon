<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 * PHP version 7
 */
namespace App\Model;

use App\Model\Connection;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Abstract class handling default manager.
 */
abstract class AbstractManager
{
    /**
     * @var \PDO
     */
    protected $pdo; //variable de connexion

    /**
     * @var string
     */
    protected $table;
    /**
     * @var string
     */
    protected $className;


    CONST BASEURI = "https://hackathon-wild-hackoween.herokuapp.com";

    /**
     * Initializes Manager Abstract class.
     * @param string $table
     */
    public function __construct(string $table = null)
    {
        $this->table = $table;
        $this->className = __NAMESPACE__ . '\\' . ucfirst($table);
        if ($table) $this->pdo = (new Connection())->getPdoConnection();
    }

    /**
     * Get all row from database.
     *
     * @return array
     */
    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table)->fetchAll();
    }

    /**
     * Get one row from database by ID.
     *
     * @param  int $id
     *
     * @return array
     */
    public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }


    protected function apiRequest(string $request, string $method = 'GET')
    {
        $client = HttpClient::create();
        $response = $client->request($method, self::BASEURI . $request);
        return $response->toArray();
    }
}
