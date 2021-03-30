<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CSV Reader for CodeIgniter 3.x
 *
 * Library to read the CSV file. It helps to import a CSV file
 * and convert CSV data into an associative array.
 *
 * This library treats the first row of a CSV file
 * as a column header row.
 *
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      CodexWorld
 * @license     http://www.codexworld.com/license/
 * @link        http://www.codexworld.com
 * @version     3.0
 */
class CSVReader {
    
    // Columns names after parsing
    private $fields;
    // Separator used to explode each line
    private $separator = ';';
    // Enclosure used to decorate each field
    private $enclosure = '"';
    // Maximum row size to be used for decoding
    private $max_row_size = 4096;
    
    /**
     * Parse a CSV file and returns as an array.
     *
     * @access    public
     * @param    filepath    string    Location of the CSV file
     *
     * @return mixed|boolean
     */
    function parse_csv($p_Filepath, $p_NamedFields = true)
    {

            $content = false;
            $file = fopen($p_Filepath, 'r');
            if($p_NamedFields) {
                $this->fields = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
            }
            while( ($row = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure)) != false ) {            
                if( $row[0] != null ) { // skip empty lines
                    if( !$content ) {
                        $content = array();
                    }
                    if( $p_NamedFields ) {
                        $items = array();
                        
                        // I prefer to fill the array with values of defined fields
                        foreach( $this->fields as $id => $field ) {
                            if( isset($row[$id]) ) {
                                $items[$field] = $row[$id];    
                            }
                        }
                        $content[] = $items;
                    } else {
                        $content[] = $row;
                    }
                }
            }
            fclose($file);
            return $content;
    }

    function escape_string($data){
        $result = array();
        foreach($data as $row){
            $result[] = str_replace('"', '', $row);
        }
        return $result;
    }   
}