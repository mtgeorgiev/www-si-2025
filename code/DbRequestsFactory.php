<?php

class DbRequestsFactory
{
    public static function getInstance(): DbRequests
    {
        return new MysqlDbRequests();
    }
}