<?php
/**
 * provides common methods for model entities.
 */
namespace General\Core\Manager\Models;

use Phalcon\Di as DiContainer;
use Phalcon\Version;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;


/**
 * defines common methods that are inherited by all Entities.
 *
 * @package General\Core\Manager\Models
 */
class ModelBase extends Model
{

  /** @var string define class name. クラス名 */
  protected $className;

  /**
   * initialization of instance.
   */
  public function initialize()
  {
    $this->setConnectionService('db');
  }


  /**
   * returns message that corresponds to validator.
   *
   * @param mixed $filter
   * @return \Phalcon\Mvc\Model\Message[]
   */
  public function getMessages($filter = null)
  {
    $l10n = DiContainer::getDefault()->get('l10n');
    $messages = [];
    /** @var Message $message */
    foreach (parent::getMessages() as $message) {
      switch ($message->getType()) {
        // Phalcon buil-in validators
        case 'Between':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($message->getMessage(), $field));
          $messages[] = $message;
        break;
        case 'Confirmation':
        case 'ExclusionIn':
        case 'Identical':
        case 'InclusionIn':
        case 'TooLong':
        case 'TooShort':
          $msg = $message->getMessage();
          if ($l10n->_($msg)) {
            $message->setMessage($l10n->_($msg));
          }
          $messages[] = $message;
        break;
        case 'Email':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('The value of %s is not valid format'), $field));
          $messages[] = $message;
        break;
        case 'Numericality':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('The value of %s is not valid numeric format'), $field));
          $messages[] = $message;
        break;
        case 'PresenceOf':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('%s is required'), $field));
          $messages[] = $message;
        break;
        case 'Regex':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('The value of %s is not valid format'), $field));
          $messages[] = $message;
        break;
        case 'Unique':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('The value of %s already exists'), $field));
          $messages[] = $message;
        break;
        case 'Url':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('The value of %s is not valid format'), $field));
          $messages[] = $message;
        break;

        // Coolrevo validators
        case 'HwAddress':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('The value of %s is not valid format'), $field));
          $messages[] = $message;
        break;
        case 'IpAddress':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('%s is not valid IP Address format'), $field));
          $messages[] = $message;
        break;
        case 'Ipv4Host':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('The value of %s is not valid format'), $field));
          $messages[] = $message;
        break;
        case 'TimeFormat':
          $field = $l10n->__($message->getField(), $this->className);
          $message->setMessage(sprintf($l10n->_('The value of %s is not valid format'), $field));
          $messages[] = $message;
        break;
        default:
          $msg = $message->getMessage();
          if ($l10n->__($msg, $this->className)) {
            $message->setMessage($l10n->__($msg, $this->className));
          } else if ($l10n->_($msg)) {
            $message->setMessage($l10n->_($msg));
          }
          $messages[] = $message;
        break;
      }
    }
    return $messages;
  }


  /**
   * inspect phalcon version and make proper validation.
   *
   * @return boolean
   */
  public function validation()
  {
    $major  = Version::getPart(Version::VERSION_MAJOR);
    $middle = Version::getPart(Version::VERSION_MEDIUM);
    $minor  = Version::getPart(Version::VERSION_MINOR);
    if ($major >= 3 || ($major == 2 && ($middle > 0 || ($middle == 0 && $minor > 17)))) {
      return $this->advancedValidation();
    } else {
      return $this->legacyValidation();
    }
  }


  /**
   * validator for version 2.0.18 and higher, using \Phalcon\Validation.
   *
   * @return boolean
   */
  protected function advancedValidation()
  {
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }


  /**
   * validator for version 2.0.18 or lower, using \Phalcon\Mvc\Model\Validation.
   *
   * @return boolean
   */
  protected function legacyValidation()
  {
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }

}
