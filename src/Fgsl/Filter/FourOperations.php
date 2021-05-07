<?php
/**
 *  FGSL Framework
 *  @author Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 *  @copyright FGSL 2021
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
namespace Fgsl\Filter;


use Laminas\Filter\AbstractFilter;
use Laminas\Filter\Exception\InvalidArgumentException;

class FourOperations extends AbstractFilter {
    const ADD = 'add';
    const SUB = 'sub';
    const MUL = 'mul';
    const DIV = 'div';
    const MOD = 'mod';
    
    /**
     * $options expects an array with two keys:
     * operation: add, sub, mul or div
     * value: value of second operand
     * @param array $options
     */
    public function __construct(array $options)
    {
        $operations = [self::ADD,self::SUB,self::MUL,self::DIV,self::MOD];
        if (!isset($options['operation']) || (!in_array($options['operation'],$operations))){
            throw new InvalidArgumentException(sprintf(
                '%s expects argument operation string with one of theses values: add, sub, mul or div; received "%s"',
                __METHOD__, $options['operation']));
        }
        if (!isset($options['value'])){
            throw new InvalidArgumentException(sprintf(
                '%s expects argument value; received none',
                __METHOD__));
        }
        $this->options = $options;
    }
    
    public function filter($value)
    {
        $operand = $this->options['value'];
        switch ($this->options['operation']){
            case self::ADD:
                return ($value + $operand);
            case self::SUB:
                return ($value - $operand);
            case self::MUL:
                return ($value * $operand);
            case self::DIV:
                return ($value / $operand);
            case self::MOD:
                return ($value % $operand);
        }
        return $value;
    }
}