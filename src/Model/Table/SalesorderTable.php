<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salesorder Model
 *
 * @method \App\Model\Entity\Salesorder newEmptyEntity()
 * @method \App\Model\Entity\Salesorder newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Salesorder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Salesorder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Salesorder findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Salesorder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Salesorder[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Salesorder|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salesorder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salesorder[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salesorder[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salesorder[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salesorder[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SalesorderTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('salesorder');
        $this->setDisplayField('salesOrderID');
        $this->setPrimaryKey('salesOrderID');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('salesOrderInvoice')
            ->maxLength('salesOrderInvoice', 100)
            ->requirePresence('salesOrderInvoice', 'create')
            ->notEmptyString('salesOrderInvoice');

        $validator
            ->integer('salesOrderProductID')
            ->requirePresence('salesOrderProductID', 'create')
            ->notEmptyString('salesOrderProductID');

        $validator
            ->integer('salesOrderQuantity')
            ->requirePresence('salesOrderQuantity', 'create')
            ->notEmptyString('salesOrderQuantity');

        $validator
            ->numeric('salesOrderAmount')
            ->requirePresence('salesOrderAmount', 'create')
            ->notEmptyString('salesOrderAmount');

        $validator
            ->numeric('salesOrderProfit')
            ->requirePresence('salesOrderProfit', 'create')
            ->notEmptyString('salesOrderProfit');

        $validator
            ->scalar('salesOrderName')
            ->maxLength('salesOrderName', 100)
            ->requirePresence('salesOrderName', 'create')
            ->notEmptyString('salesOrderName');

        $validator
            ->numeric('salesOrderPrice')
            ->requirePresence('salesOrderPrice', 'create')
            ->notEmptyString('salesOrderPrice');

        $validator
            ->scalar('salesOrderType')
            ->maxLength('salesOrderType', 100)
            ->requirePresence('salesOrderType', 'create')
            ->notEmptyString('salesOrderType');

        $validator
            ->numeric('salesOrderDiscount')
            ->requirePresence('salesOrderDiscount', 'create')
            ->notEmptyString('salesOrderDiscount');

        $validator
            ->scalar('salesOrderDate')
            ->maxLength('salesOrderDate', 100)
            ->requirePresence('salesOrderDate', 'create')
            ->notEmptyString('salesOrderDate');

        return $validator;
    }
}
