<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sales Model
 *
 * @method \App\Model\Entity\Sale newEmptyEntity()
 * @method \App\Model\Entity\Sale newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sale findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sale[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SalesTable extends Table
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

        $this->setTable('sales');
        $this->setDisplayField('saleID');
        $this->setPrimaryKey('saleID');
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
            ->scalar('saleInvoiceNumber')
            ->maxLength('saleInvoiceNumber', 100)
            ->requirePresence('saleInvoiceNumber', 'create')
            ->notEmptyString('saleInvoiceNumber');

        $validator
            ->scalar('saleCashier')
            ->maxLength('saleCashier', 100)
            ->requirePresence('saleCashier', 'create')
            ->notEmptyString('saleCashier');

        $validator
            ->scalar('saleDate')
            ->maxLength('saleDate', 100)
            ->requirePresence('saleDate', 'create')
            ->notEmptyString('saleDate');

        $validator
            ->scalar('saleType')
            ->maxLength('saleType', 100)
            ->requirePresence('saleType', 'create')
            ->notEmptyString('saleType');

        $validator
            ->scalar('saleAmount')
            ->maxLength('saleAmount', 100)
            ->requirePresence('saleAmount', 'create')
            ->notEmptyString('saleAmount');

        $validator
            ->scalar('saleProfit')
            ->maxLength('saleProfit', 100)
            ->requirePresence('saleProfit', 'create')
            ->notEmptyString('saleProfit');

        $validator
            ->numeric('balance')
            ->requirePresence('balance', 'create')
            ->notEmptyString('balance');

        return $validator;
    }
}
