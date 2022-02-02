<?php

namespace task;

    class Task1 
    {
        protected $data;

        public function  __construct($data){
            
            $this->data = $data;

        }

        public function JSON_FILE()
        {

            if (gettype($this->data) == 'array') {
                $arr = array();

                foreach ($this->data as $index => $value) {

                    $value = trim($value);

                    $file = file_get_contents($value);
           
                    $arr[] = json_decode($file , true);
                }

                $this->data = $arr;
            }else{

                $file = file_get_contents($this->data);
                $this->data = json_decode($file , true);
            }

            return $this;
        }



        public function JSON()
        {
            $this->data = json_decode($this->data, true);
            return $this;
        }


        public function STRING($separator = ',')
        {
           $this->data = explode( $separator , $this->data);
           return $this;
        }


        public function BOOLEAN()
        {
            if (is_string($this->data)) {
               $this->data =(bool) trim($this->data) ;
            }else {
                $this->data = (bool) $this->data;
            }

            return $this;
        }


        public function get()
        {
           return $this->data;
        }
       
    }
    
