<?php
namespace Webservice\Bug;

use Webservice\Database\AbstractDbHandler;
use Helper\PostGisSqlHelper;

class BugHandler extends AbstractDbHandler
{
    protected $bugTable = 'kort.errors';
    protected $bugFields = array(
        'id',
        'schema',
        'type',
        'osm_id',
        'osm_type',
        'title',
        'description',
        'latitude',
        'longitude',
        'view_type',
        'answer_placeholder'
    );

    public function getBugsByOwnPosition($lat, $lng, $limit, $radius)
    {
        $where = "ST_Within(geom,ST_Buffer(" . PostGisSqlHelper::getLatLngGeom($lat, $lng) . "," . $radius . "))";
        $orderBy = "ST_Distance(geom," . PostGisSqlHelper::getLatLngGeom($lat, $lng) . ")";
        $result = $this->db->doSelectQuery($this->bugFields, $this->bugTable, $where, $orderBy, $limit);
        return json_encode($result);
    }

    public function getTracktypes()
    {
        $fields = array('id', 'type_key', 'title', 'sorting');
        $table = 'kort.tracktype';
        $where = '';
        $orderBy = 'sorting';
        $limit = '';
        $result = $this->db->doSelectQuery($fields, $table, $where, $orderBy, $limit);
        return json_encode($result);
    }
}