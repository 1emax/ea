<?php
namespace App\Model\Table;

use App\Model\Entity\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Places
 * @property \Cake\ORM\Association\HasMany $Tickets
 * @property \Cake\ORM\Association\BelongsToMany $Rooms
 * @property \Cake\ORM\Association\BelongsToMany $Tags
 */
class EventsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('events');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Places', [
            'foreignKey' => 'place_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Tickets', [
            'foreignKey' => 'event_id'
        ]);
        $this->belongsToMany('Rooms', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'room_id',
            'joinTable' => 'events_rooms'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'events_tags'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->add('price', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('price');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('url');

        $validator
            ->add('event_date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('event_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['place_id'], 'Places'));
        return $rules;
    }

    // The $query argument is a query builder instance.
    // The $options array will contain the 'tags' option we passed
    // to find('tagged') in our controller action.
    public function findTagged(Query $query, array $options)
    {
        return $this->find()
            ->distinct(['Events.id'])
            ->matching('Tags', function ($q) use ($options) {
                if (empty($options['tags'])) {
                    return $q->where(['Tags.name IS' => null]);
                }
                return $q->where(['Tags.name IN' => $options['tags']]);
            });
    }

    public function beforeSave($event, $entity, $options)
    {
        if ($entity->tag_string) {
            $entity->tags = $this->_buildTags($entity->tag_string);
        }
    }

    protected function _buildTags($tagString)
    {
        $new = array_unique(array_map('trim', explode(',', $tagString)));
        $out = [];
        $query = $this->Tags->find()
            ->where(['Tags.name IN' => $new]);

        // Remove existing tags from the list of new tags.
        foreach ($query->extract('name') as $existing) {
            $index = array_search($existing, $new);
            if ($index !== false) {
                unset($new[$index]);
            }
        }
        // Add existing tags.
        foreach ($query as $tag) {
            $out[] = $tag;
        }
        // Add new tags.
        foreach ($new as $tag) {
            $out[] = $this->Tags->newEntity(['name' => $tag]);
        }
        return $out;
    }
}
