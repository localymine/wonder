<?php
/**
 * provides Common model entity.
 * 共通マスタのMVCモデルを提供する
 */
namespace General\Core\Manager\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;
use Phalcon\Mvc\Model\Resultset;
use Phalcon\Mvc\Model\ResultsetInterface;
use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;


/**
 * class for Common model Entity.
 * 共通マスタ
 *
 * @package Coolrevo\Smc\Servicer\Models
 */
class Common extends ModelBase implements ModelInterface
{

  /** @var string define class name. クラス名 */
  protected $className = 'Common';

  /**
   * Par Level
   */
  const G_EXCHANGE  = 208;
  const G_PAR_LEVEL = 1;

  /**
   * primary key.
   * 主キー
   * @var integer
   * @Primary
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $id;
  /**
   * ID of master.
   * 定義グループID
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $cid;
  /**
   * sort order of items that belongs to same master.
   * 定義値のグループ内でのソート順
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $seq;
  /**
   * display name of item.
   * 定義値表示名
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $name;
  /**
   * the value of item.
   * 値
   * @var string
   * @Column(type="string")
   */
  public $value;
  /**
   * remarks.
   * 備考
   * @var string
   * @Column(type="string")
   */
  public $remarks;


  /**
   * returns the name of table that persists this model.
   * 関連付けられたテーブル名を返す
   *
   * @return string
   */
  public function getSource()
  {
    return 'commons';
  }


  /**
   * returns correspondence table of column names and properties.
   * カラム名のマッピングを返す
   *
   * @return array
   */
  public function columnMap()
  {
    return [
      'id'      => 'id',
      'cid'     => 'cid',
      'seq'     => 'seq',
      'name'    => 'name',
      'value'   => 'value',
      'remarks' => 'remarks',
      'deleted' => 'deleted',
      'created' => 'created',
      'updated' => 'updated',
    ];
  }


  /**
   * override Model::find.
   * Model::findのオーバーライド
   *
   * @param mixed $parameters
   * @return Resultset|ResultsetInterface
   */
  public static function find($parameters = null) {
    return parent::find($parameters);
  }


  /**
   * override Model::findFirst.
   * Model::findFistのオーバーライド
   *
   * @param mixed $parameters
   * @return Common|ModelBase|Model
   */
  public static function findFirst($parameters = null) {
    return parent::findFirst($parameters);
  }


  /**
   * initialization of instance.
   * Modelの初期化
   */
  public function initialize()
  {
    /* enable partial update instead of all-field update.
     * カラム単位での保存を可能に */
    $this->useDynamicUpdate(true);
    /* configure model behaviours.
     * ビヘイビアの設定 */
    $this->addBehavior(
      /* insert timestamp on create / update.
       * 作成・更新時それぞれ自動でタイムスタンプを入れる */
      new Timestampable([
        'beforeValidationOnCreate' => [
          'field' => [
            'created',
            'updated',
          ],
          'format' => 'Y-m-d H:i:s',
        ],
        'beforeValidationOnUpdate' => [
          'field'  => 'updated',
          'format' => 'Y-m-d H:i:s',
        ],
      ])
    );
  }


  /**
   * validator implementation for version 2.0.18 and higher.
   * v2.0.18以降で使用するバリデーション
   *
   * @return boolean
   */
  protected function advancedValidation()
  {
    $validator = new Validation();
    $validator->rules('name', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $this->validate($validator);
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }


  /**
   * validator implementation for version 2.0.18 or lower.
   * v2.0.18未満で使用するバリデーション
   *
   * @return boolean
   */
  public function legacyValidation()
  {
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf([
      'field'    => 'name',
      'required' => true,
    ]));
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }

}
