<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\AnalyticsReporting;

class DynamicSegment extends \Google\Model
{
  /**
   * @var string
   */
  public $name;
  /**
   * @var SegmentDefinition
   */
  public $sessionSegment;
  protected $sessionSegmentType = SegmentDefinition::class;
  protected $sessionSegmentDataType = '';
  /**
   * @var SegmentDefinition
   */
  public $userSegment;
  protected $userSegmentType = SegmentDefinition::class;
  protected $userSegmentDataType = '';

  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param SegmentDefinition
   */
  public function setSessionSegment(SegmentDefinition $sessionSegment)
  {
    $this->sessionSegment = $sessionSegment;
  }
  /**
   * @return SegmentDefinition
   */
  public function getSessionSegment()
  {
    return $this->sessionSegment;
  }
  /**
   * @param SegmentDefinition
   */
  public function setUserSegment(SegmentDefinition $userSegment)
  {
    $this->userSegment = $userSegment;
  }
  /**
   * @return SegmentDefinition
   */
  public function getUserSegment()
  {
    return $this->userSegment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DynamicSegment::class, 'Google_Service_AnalyticsReporting_DynamicSegment');
