<?php
/* 
 * Copyright (c) 2009 Nguyen Duc Thuan <me@ndthuan.com>
 * All rights reserved.
 */
namespace App\data;
defined("APPPATH") OR die("Access denied");


class DataGridView{    
    protected $_columns         = array();
    protected $_headers         = array();
    protected $_cellTemplates   = array();
	protected $_cellAttributes  = array();
	protected $_cellLink	=array();
	protected $_filterByColumn	=array();
    protected $_gridAttributes  = array();
    protected $_enabledSorting  = false;
    protected $_sortableFields  = array();
    protected $_alterRowClass   = null;
    protected $_rowClass        = null;
	protected $_tableClass		=null;
    protected $_datarows        = array();
    protected $_tableId         = 0;
    protected $_startingCounter = 0;
    protected static $_staticTableId    = 0;
	

    /**
     *
     * @param array $datarows
     * @return Fete_ViewControl_DataGrid
     */
    public static function getInstance($datarows = array()){
        return new self($datarows);
    }
    public function __construct($datarows = array()){
        $this->_datarows = $datarows;
        if (isset($datarows[0])) {
            foreach ($datarows[0] as $field => $value){
                $this->_columns[] = $field;
                $this->_sortableFields[] = $field;
            }
        }

        $this->_tableId = ++self::$_staticTableId;
        $this->_gridAttributes['id'] = 'fdg_' . $this->_tableId;
    }
    /**
     *
     * @param boolean $enabled
     * @return Fete_ViewControl_DataGrid
     */
    public function &enableSorting($enabled){
        $this->_enabledSorting = $enabled;
        return $this;
    }
    /**
     *
     * @param array $settings
     * @return Fete_ViewControl_DataGrid
     */
    public function &setup($settings){
        foreach ($settings as $field => $setting){
            if (isset($setting['header'])) {
                $this->_headers[$field] = $setting['header'];
            }
            if (isset($setting['cellTemplate'])) {
                $this->_cellTemplates[$field] = $setting['cellTemplate'];
            }
            if (isset($setting['attributes'])) {
                $this->_cellAttributes[$field] = $setting['attributes'];
            }
			if (isset($setting['link'])) {
                $this->_cellLink[$field] = $setting['link'];
            }
			if (isset($setting['filterColumn'])) {
                $this->_filterByColumn[$field] = $setting['filterColumn'];
            }
        }

        return $this;
    }
    /**
     *
     * @param array $attributes
     * @return Fete_ViewControl_DataGrid
     */
    public function &setGridAttributes($attributes){
        foreach ($attributes as $name => $value){
            $this->_gridAttributes[$name] = $value;
        }
        return $this;
    }
    /**
     *
     * @param string $name
     * @param string $value
     * @return Fete_ViewControl_DataGrid
     */
    public function &setGridAttribute($name, $value){
        $this->_gridAttributes[$name] = $value;
        return $this;
    }
    /**
     *
     * @param string $field
     * @param string $template
     * @return Fete_ViewControl_DataGrid
     */
    public function &setCellTemplate($field, $template){
        $this->_cellTemplates[$field] = $template;
        return $this;
    }
    /**
     *
     * @param string $field
     * @param array $attributes
     * @return Fete_ViewControl_DataGrid
     */
    public function &setCellAttributes($field, $attributes){
        if (isset($this->_cellAttributes[$field])) {
            foreach ($attributes as $name => $value)
            {
                $this->_cellAttributes[$field][$name] = $value;
            }
        } else {
            $this->_cellAttributes[$field] = $attributes;
        }
        return $this;
    }
    /**
     *
     * @param string $field
     * @param string $name
     * @param string $value
     * @return Fete_ViewControl_DataGrid
     */
    public function &setCellAttribute($field, $name, $value){
        if (isset($this->_cellAttributes[$field])) {
            $this->_cellAttributes[$field][$name] = $value;
        }
        $this->_cellAttributes[$field] = array($name => $value);
        return $this;
    }
	/**
	**/
	public function &setCellLink($field,$link){
		 $this->_cellLink[$field] = $link;
        return $this;
	}
		/**
	**/
	public function &setFilterColumn($field,$filter){
		 $this->_filterByColumn[$field] = $filter;
        return $this;
	}
    /**
     *
     * @param string $field
     * @param string $header
     * @return Fete_ViewControl_DataGrid
     */
    public function &setHeader($field, $header){
        $this->_headers[$field] = $header;
        return $this;
    }
    /**
     *
     * @param string $columnName
     * @return Fete_ViewControl_DataGrid
     */
    public function &removeColumn($columnName){
        $counter = 0;
        foreach ($this->_columns as $column){
            if ($column === $columnName) {
                array_splice($this->_columns, $counter, 1);
                return $this;
            }
            ++$counter;
        }
        return $this;
    }
    /**
     *
     * @param string $columnName
     * @param string $cellTemplate
     * @param string $header
     * @param array $attributes
     * @return Fete_ViewControl_DataGrid
     */
    public function &addColumnBefore($columnName, $cellTemplate = '', $header = '', $attributes = array()){
        $this->_columns = array_merge(array($columnName), $this->_columns);
        $this->_cellTemplates[$columnName] = $cellTemplate;
        $this->_headers[$columnName] = $header;
        $this->_cellAttributes[$columnName] = $attributes;

        return $this;
    }
    /**
     *
     * @param string $columnName
     * @param string $cellTemplate
     * @param string $header
     * @param array $attributes
     * @return Fete_ViewControl_DataGrid
     */
    public function &addColumnAfter($columnName, $cellTemplate = '', $header = '', $attributes = array()){
        $this->_columns[] = $columnName;
        $this->_cellTemplates[$columnName] = $cellTemplate;
        $this->_headers[$columnName] = $header;
        $this->_cellAttributes[$columnName] = $attributes;

        return $this;
    }
    /**
     *
     * @param string $cssClass
     * @return Fete_ViewControl_DataGrid
     */
    public function &setRowClass($cssClass){
        $this->_rowClass = $cssClass;
        return $this;
    }
    /**
     *
     * @param string $cssClass
     * @return Fete_ViewControl_DataGrid
     */
    public function &setAlterRowClass($cssClass){
        $this->_alterRowClass = $cssClass;

        return $this;
    }
    /**
     *
     * @param integer $counter
     * @return Fete_ViewControl_DataGrid
     */
    public function &setStartingCounter($counter){
        $this->_startingCounter = $counter;

        return $this;
    }
     public function getString(){
        $sortField  = '';
        $sortOrder  = '';
        $data       = $this->_datarows;
		if ($this->_enabledSorting && isset($_POST['__sf'])) {
            $sortField = $_POST['__sf'];
            $sortOrder = $_POST['__so'];
            $dataToSort = array();
            foreach ($data as $row){
                $dataToSort[] = $row[$sortField];
            }
            array_multisort($dataToSort, 'desc' === $sortOrder ? SORT_DESC : SORT_ASC, $data);
        }

        $output = '';
        if ($this->_enabledSorting) {
            $output .= '
							<form id="fdg_form_' . $this->_tableId . '" method="post" action="' . $_SERVER['REQUEST_URI'] . '">
							<input type="hidden" id="__sf" name="__sf" value="" />
							<input type="hidden" id="__so" name="__so" value="" />';
		}
		$output .= '<table';
								foreach ($this->_gridAttributes as $name => $value){
								$output .= ' ' . $name . '="' . $value . '"';
								}
		$output .= '>' . "\n";
		//Headers de la tabla//
		if (!empty($this->_headers)) {
		$output .= '<thead><tr>' .  "\n";
						foreach ($this->_columns as $field){
							$isSortable = in_array($field, $this->_sortableFields) ? true : false;
							$output .= "\t" . '<th';
							if ($this->_enabledSorting && $isSortable) {
								$output .= ' onclick="document.getElementById(\'fdg_form_' . $this->_tableId . '\').setAttribute(\'action\', self.location.href);document.getElementById(\'__sf\').value=\'' . $field . '\';document.getElementById(\'__so\').value=\'' . (('' === $sortOrder && '' === $sortField) || $sortField !== $field || ('desc' === $sortOrder  && $field === $sortField) ? 'asc' : 'desc') . '\'; document.getElementById(\'fdg_form_' . $this->_tableId . '\').submit();"';
							}
							$output .= ' id="fdg_' . $this->_tableId . '_header_' . $field . '" class="fdg_' . $this->_tableId . '_header' . ($this->_enabledSorting && $isSortable ? ' fdg_sortable' : '') . ($field === $sortField ? ' fdg_sort_' . $sortOrder : '') . '">' . (isset($this->_headers[$field]) ? $this->_headers[$field] : '') . '</th>' .  "\n";
						}
						$output .= '</tr></thead>' .  "\n";
					}
					//Comienza a imprimir el cuerpo de la tabla//
					if (isset($this->_datarows[0])) {
						$counter = 0;
						foreach ($data as $offset => $row){
							++$counter;
							$rowCounter = $offset + $this->_startingCounter;
							$output .= '<tbody>' . "\n";
							$output .= '<tr class="gradeA">' . "\n";
							foreach ($this->_columns as $field){
								$data	       = isset($row[$field]) ? $row[$field] : '';
								$template	   = isset($this->_cellTemplates[$field]) ? $this->_cellTemplates[$field] : '';
								$link 		   =isset($this->_cellLink[$field])?$this->_cellLink[$field]:'';
								$filterColumn=isset($this->_filterByColumn[$field])?$this->_filterByColumn[$field]:0;
								$output .= "\t" . '<td';
								if (isset($this->_cellAttributes[$field])) {
									foreach ($this->_cellAttributes[$field] as $name => $value)
									{
										$output .= ' ' . $name . '="' . $value . '"';
									}
								}
								$reminder = $counter % 2;
								if (0 === $reminder && null !== $this->_alterRowClass) {
									$output .= ' class="' . $this->_alterRowClass . '"';
								} elseif (0 < $reminder && null !== $this->_rowClass) {
									$output .= ' class="' . $this->_rowClass . '"';
								}
								$output .= '>';
								if (!empty($template)) {
									$data = str_replace('%data%', $data, $template);
									$data = str_replace('%counter%', $rowCounter, $data);
									@$data = preg_replace('#(\$(.+?)\$)#sie', 'isset($row["\\2"]) ? $row["\\2"] : \'\\1\'', $data);//Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead
									preg_match_all('#\[\[([a-z0-9_]+)(?::(.+?))?\]\]#si', $data, $matches, PREG_SET_ORDER);

									foreach ($matches as $match){
										if (isset($match[2])) {
											$params = explode(',', $match[2]);
										} else {
											$params = array();
										}
										$data = str_replace($match[0], call_user_func_array($match[1], $params), $data);
									}
								}
								if (!empty($link)) {
									$output .= ' <a href=" ' . $link . $row[$filterColumn] . ' " >';
								}
								$output .= $data . '</td>' . "\n";
								if (!empty($link)) {
									$output .= '</a>';
								}
							}
							$output .= '</tr>' . "\n";
							$output .= '</tbody>' . "\n";
						}
					}
					if (!empty($this->_headers)) {
						$output .= '<tfoot><tr>' .  "\n";
						foreach ($this->_columns as $field){
							$isSortable = in_array($field, $this->_sortableFields) ? true : false;
							$output .= "\t" . '<th>';
							$output .= (isset($this->_headers[$field]) ? $this->_headers[$field] : '') . '</th>' .  "\n";
						}
						$output .= '</tr></tfoot>' .  "\n";
					}
					$output .= '</table>';
					if ($this->_enabledSorting) {
					$output .= '</form>';
					}

		return $output;
    }
    public function render(){
        echo $this->getString();
    }
    public function toString(){
        return $this->getString();
    }
}