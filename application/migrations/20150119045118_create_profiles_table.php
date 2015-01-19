<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_profiles_table Extends CI_Migration{

	public function up(){
		$this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
            ),
            'firstname' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100
            ),
            'lastname' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('profiles');
	}

	public function down(){
		$this->dbforge->drop_table('profiles');
	}

}