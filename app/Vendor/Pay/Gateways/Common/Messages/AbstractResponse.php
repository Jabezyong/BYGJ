<?php
/**
 * Abstract Response
 */
namespace App\Vendor\Pay\Gateways\Common\Messages;

use App\Vendor\Pay\Gateways\Common\Messages\Traits\HasDatamap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * Abstract Response
 *
 * This abstract class implements ResponseInterface and defines a basic
 * set of functions that all Omnipay Requests are intended to include.
 *
 * Objects of this class or a subclass are usually created in the Request
 * object (subclass of AbstractRequest) as the return parameters from the
 * send() function.
 *
 * Example -- validating and sending a request:
 *
 * <code>
 * $myResponse = $myRequest->send();
 * // now do something with the $myResponse object, test for success, etc.
 * </code>
 *
 * @see ResponseInterface
 */
abstract class AbstractResponse
{
    use HasDatamap;

    /**
     * The embodied request object.
     *
     * @var RequestInterface
     */
    public $request;

    /**
     * The data contained in the response.
     *
     * @var mixed
     */
    public $data;

    public $modle;

    /**
     * Constructor
     *
     * @param RequestInterface $request the initiating request.
     * @param mixed $data
     */
    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    /**
     * handle data, overide this method if needed
     */
    public function handle()
    {}

    /**
     * Get the initiating request object.
     *
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    public function getValue($key = null, $default = null)
    {
        $this->request->getValue($key, $default, $this->data);
    }

    public function getStatus()
    {
        parse_str($this->data, $data_array);
        $status = $this->request->getValue('status', null, $data_array);
        return Arr::get($this->request->gateway->status_map, $status);
    }

    protected function updateModel(array $attributes)
    {
        $this->request->model->forcefill($attributes)->save();
    }

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * Is the transaction cancelled by the user?
     *
     * @return boolean
     */
    public function isCancelled()
    {
        return false;
    }

    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return null;
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return null;
    }

    /**
     * Gateway Reference
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return null;
    }

    /**
     * Get the transaction ID as generated by the merchant website.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return null;
    }
}
