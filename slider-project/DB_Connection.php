<?php
include_once('config.php');

/*
create database tables using these sql queries

CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS slides (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    title VARCHAR(255),
    tag VARCHAR(255),
    image VARCHAR(255),
    link VARCHAR(255),
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(category_id)
    REFERENCES categories(id)
);
*/
if (!class_exists('DB_Connection')) {
	class DB_Connection
	{
		private $db;
		public function __construct()
    	{
    		$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4";
    		$this->db = new PDO($dsn, DB_USERMAME, DB_PASSWORD);
		}

		/**
	     * Get all records
	     */
	    public function getAll(
	        string $table,
	        string $orderBy = 'id',
	        string $direction = 'ASC',
	        string $condition = '',
	    ): array {

	        $sql = "SELECT * FROM {$table}
	                ORDER BY {$orderBy} {$direction}";

	        $stmt = $this->db->prepare($sql);
	        $stmt->execute();

	        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	    }

	    /*
	    Execute plain SQL
	    */
	    public function querySQL($query
	    ): array {
	        $stmt = $this->db->query($query);
	        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	    }

	    /**
	     * Get single record
	     */
	    public function getById(
	        string $table,
	        int $id,
	        string $primaryKey = 'id'
	    ): array|false {

	        $sql = "SELECT *
	                FROM {$table}
	                WHERE {$primaryKey} = :id";

	        $stmt = $this->db->prepare($sql);

	        $stmt->execute([
	            'id' => $id
	        ]);

	        return $stmt->fetch(PDO::FETCH_ASSOC);
	    }

	    /**
	     * Insert record
	     */
	    public function insert(
	        string $table,
	        array $data
	    ): int {

	        $columns = implode(',', array_keys($data));

	        $placeholders = ':' . implode(', :', array_keys($data));

	        $sql = "INSERT INTO {$table}
	                ({$columns})
	                VALUES
	                ({$placeholders})";

	        $stmt = $this->db->prepare($sql);

	        $stmt->execute($data);

	        return (int)$this->db->lastInsertId();
	    }

	    /**
	     * Update record
	     */
	    public function update(
	        string $table,
	        array $data,
	        int $id,
	        string $primaryKey = 'id'
	    ): bool {

	        $fields = [];

	        foreach ($data as $column => $value) {
	            $fields[] = "{$column} = :{$column}";
	        }

	        $sql = "UPDATE {$table}
	                SET " . implode(', ', $fields) . "
	                WHERE {$primaryKey} = :id";

	        $data['id'] = $id;

	        $stmt = $this->db->prepare($sql);

	        return $stmt->execute($data);
	    }

	    /**
	     * Delete record
	     */
	    public function delete(
	        string $table,
	        int $id,
	        string $primaryKey = 'id'
	    ): bool {

	        $sql = "DELETE FROM {$table}
	                WHERE {$primaryKey} = :id";

	        $stmt = $this->db->prepare($sql);

	        return $stmt->execute([
	            'id' => $id
	        ]);
	    }

	    /**
	     * Count records
	     */
	    public function count(string $table): int
	    {
	        $sql = "SELECT COUNT(*) as total
	                FROM {$table}";

	        return (int)$this->db
	            ->query($sql)
	            ->fetch(PDO::FETCH_ASSOC)['total'];
	    }
	}
}