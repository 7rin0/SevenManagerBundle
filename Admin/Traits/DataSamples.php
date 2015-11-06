<?php
/**
 * User: lseverino
 * Date: 01/11/15
 * Time: 08:24
 */

namespace SevenManagerBundle\Admin\Traits;

/**
 * Class DataSamples
 *
 * @package SevenManagerBundle\Admin\Traits
 */
trait DataSamples
{
    /**
     * @return string
     */
    public function getDataTable()
    {
        $modelOne = "
            <table>
              <tr>
                <td>John</td>
                <td>Doe</td>
              </tr>
              <tr>
                <td>Jane</td>
                <td>Doe</td>
              </tr>
            </table>
        ";

        return $modelOne;
    }
}
