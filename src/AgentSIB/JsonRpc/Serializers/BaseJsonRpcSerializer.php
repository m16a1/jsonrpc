<?php


namespace AgentSIB\JsonRpc\Serializers;


use AgentSIB\JsonRpc\JsonRpcException;

class BaseJsonRpcSerializer implements JsonRpcSerializerInterface
{

    /**
     * @inheritdoc
     */
    public function parseRequest ($request)
    {
        if (!is_string($request)) {
            throw new JsonRpcException(JsonRpcException::ERROR_PARSE_ERROR);
        }

        return @json_decode($request, false, 32);
    }

    /**
     * @inheritdoc
     */
    public function serializeResponse ($response)
    {
        if ($response == null) {
            return '';
        }
        
        if (defined('JSON_UNESCAPED_UNICODE')) {
            return json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        
        return json_encode($response);
    }
}
