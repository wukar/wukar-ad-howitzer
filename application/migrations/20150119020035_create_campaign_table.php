<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_campaign_table Extends CI_Migration{

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
            'campaign_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100
            ),
            'campaign_description' => array(
                    'type' => 'text',
                    'null' => true
            ),
            'campaign_countries' => array(
                    'type' => 'text',
                    'null' => true
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('campaigns');
	}

	public function down(){
		$this->dbforge->drop_table('campaigns');
	}

}