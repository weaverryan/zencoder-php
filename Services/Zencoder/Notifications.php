<?php
/**
 * Zencoder API client interface.
 *
 * @category Services
 * @package  Services_Zencoder
 * @author   Michael Christopher <m@zencoder.com>
 * @version  2.0
 * @license  http://creativecommons.org/licenses/MIT/MIT
 * @link     http://github.com/zencoder/zencoder-php
 */

class Services_Zencoder_Notifications extends Services_Zencoder_Base {
  /**
   * Parse and process incoming notifications from Zencoder
   *
   * @return Services_Zencoder_Notification Parsed notification data
   */
  public function parseIncoming() {
    $incoming_data = json_decode(trim(file_get_contents('php://input')), true);
    if (!$incoming_data) {
      throw new Services_Zencoder_Exception(
        'Unable to parse notification data: ' . file_get_contents('php://input'));
    }
    return new Services_Zencoder_Notification($incoming_data);
  }
}