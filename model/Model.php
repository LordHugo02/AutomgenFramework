<?php
    
    namespace model;
    
    class Model {
        
        public function __construct(array $data = array()) {
            foreach ($data as $key=>$value) {
                $this->$key = $value;
            }
        }
        
        public function __call(string $name, array $arguments) {
            if(preg_match('/^set.+$/', $name)) {
                // setter
                $property = substr($name, 3);
                if ((property_exists($this, strtolower($property)) || property_exists($this, $property)) && count($arguments) === 1) {
                    if(property_exists($this, strtolower($property))) {
                        $property = strtolower($property);
                    }
                    $this->$property = $arguments[0];
                    return true;
                } else {
                    trigger_error('SET : La propriété ' . $property . ' n\'existe pas ! ' . __FILE__ . ':' . __LINE__, E_USER_ERROR);
                }
            } else {
                // getter
                $property = $name;
                if (property_exists($this, $property) && count($arguments) === 0) {
                    return $this->$property;
                } else {
                    trigger_error('TEST : La propriété ' . $property . ' n\'existe pas ! ' . __FILE__ . ':' . __LINE__, E_USER_ERROR);
                }
            }
        }
    }