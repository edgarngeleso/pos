<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'userID' => 1,
                'userName' => 'Lorem ipsum dolor sit amet',
                'userPassword' => 'Lorem ipsum dolor sit amet',
                'isAdmin' => 1,
            ],
        ];
        parent::init();
    }
}
