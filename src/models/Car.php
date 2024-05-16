<?php

/**
 * Model class representing cars table in the database.
 */
class Car
{
    const TABLE_NAME = 'cars';
    private PDO|null $_conn;
    private int|null $_id;
    private string $_make;
    private string $_model;
    private string $_color;
    private string|null $_createDate;

    public function getId(): int|null
    {
        return $this->_id;
    }

    public function setId(int $id): Car
    {
        $this->_id = $id;
        return $this;
    }

    public function getMake(): string
    {
        return $this->_make;
    }

    public function setMake(string $make): Car
    {
        $this->_make = $make;
        return $this;
    }

    public function getModel(): string
    {
        return $this->_model;
    }

    public function setModel(string $model): Car
    {
        $this->_model = $model;
        return $this;
    }

    public function getColor(): string
    {
        return $this->_color;
    }

    public function setColor(string $color): Car
    {
        $this->_color = $color;
        return $this;
    }

    public function getCreateDate(): Datetime|null
    {
        $datetime = $this->_createDate;
        if (gettype($datetime) === 'NULL') {
            return null;
        }
        return new DateTime(datetime: $this->_createDate);
    }

    private function __construct(
        string $make,
        string $model,
        string $color,
        int|null $id = null,
        string|null $createDate = null
    ) {
        $this->_id = $id;
        $this->_conn = Database::connect();
        $this->_make = $make;
        $this->_model = $model;
        $this->_color = $color;
        $this->_createDate = $createDate;
    }

    /**
     * Function closing objects database connection.
     */
    public function closeConn(): void
    {
        $this->_conn = null;
    }

    /**
     * Function for saving object to database.
     */
    public function save(): bool
    {
        // work in progress
        return false;
    }

    /**
     * Function for deleting object from database.
     */
    public function delete(): bool
    {
        // work in progress
        return false;
    }

    /**
     * Function returning objects data as associative array.
     */
    public function getData(): array
    {
        return [
            'id' => $this->getId(),
            'make' => $this->getMake(),
            'model' => $this->getModel(),
            'color' => $this->getColor(),
            'createDate' => $this->getCreateDate(),
        ];
    }

    /**
     * Function for creating new Car object.
     */
    public static function create(string $make, string $model, string $color): Car
    {
        $args = [$make, $model, $color];
        foreach ($args as $value) {
            if (strlen($value) > 255) {
                throw new Exception(
                    message: 'Data field values must not be
                                longer than 255 characters',
                    code: 422,
                );
            }
        }
        return new Car(make: $make, model: $model, color: $color);
    }

    /**
     * Function returning all objects from database.
     */
    public static function findAll(string | null $filter = null, string | null $value = null): array
    {
        $available_filters = ["make", "model", "color"];
        $conn = Database::connect();
        $tableName = Car::TABLE_NAME;
        
        if ($filter && $value) {
            $value = str_replace('-', ' ', $value);
            if (!in_array($filter, $available_filters)) {
                throw new Exception(message: "Filter {$filter} not available.");
            }
            $query = "SELECT * FROM {$tableName} WHERE {$filter}='{$value}';";
        } else {
            $query = "SELECT * FROM {$tableName};";
        }
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $objArr = [];

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $obj = new Car(
                    make: $row['make'],
                    model: $row['model'],
                    color: $row['color'],
                    id: intval(value: $row['id']),
                    createDate: $row['create_date'],
                );
                array_push($objArr, $obj);
            }
        }
        $stmt = null;
        $conn = null;
        return $objArr;
    }
    
    /**
     * Function retrieving single Car from database by id.
     */
    public static function find(int $id): Car
    {
        $conn = Database::connect();
        $tableName = Car::TABLE_NAME;
        $query = "SELECT * FROM {$tableName} WHERE id = :id;";
        $stmt = $conn->prepare(query: $query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            throw new Exception(message: 'Object not found', code: 404);
        }
        return new Car(
            make: $data['make'],
            model: $data['model'],
            color: $data['color'],
            id: intval(value: $data['id']),
            createDate: $data['create_date'],
        );
    }
}
