<?php
/*
 * Kimkëlen - School Management Software
 * Copyright (C) 2013 CeSPI - UNLP <desarrollo@cespi.unlp.edu.ar>
 *
 * This file is part of Kimkëlen.
 *
 * Kimkëlen is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License v2.0 as published by
 * the Free Software Foundation.
 *
 * Kimkëlen is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kimkëlen.  If not, see <http://www.gnu.org/licenses/gpl-2.0.html>.
 */ ?>
<?php

/**
 * CommissionCourse form.
 *
 * @package    conservatorio
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CommissionForm extends BaseCourseForm
{

  public function configure()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('Asset'));

    unset($this["is_closed"], $this["division_id"], $this["current_period"], $this['related_division_id'], $this['is_pathway'],$this['evaluation_date']);

    $this->setWidget('starts_at', new csWidgetFormDateInput());
    $this->setValidator('starts_at', new mtValidatorDateString());

    $this->widgetSchema->moveField("starts_at", "after", "quota");

    $this->widgetSchema["school_year_id"] = new sfWidgetFormInputHidden();
    $this->setDefault("school_year_id", SchoolYearPeer::retrieveCurrent()->getId());
  }
}