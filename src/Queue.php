<?php
declare(strict_types=1);

namespace Interop\Collection;

use InvalidArgumentException;

/**
 * Contract for working with the 'queue' abstract data type (ADT).
 * 
 * A 'queue' is a first-in-first-out (FIFO) data structure. Items
 * must leave the queue in the order they arrived in.
 * 
 * @link https://en.wikipedia.org/wiki/Queue_(abstract_data_type)
 * @link https://en.wikipedia.org/wiki/FIFO_(computing_and_electronics)
 * @author Nathan Bishop <nbish11@hotmail.com>
 * @copyright 2019 Nathan Bishop
 * @license The MIT license.
 */
interface Queue
{
	/**
	 * Add an item to the queue.
	 * 
	 * @param object $item The item to add.
	 * @throws InvalidArgumentException If $item is a different type to what is already in the queue.
	 */
	public function enqueue(object $item): void;
	
	/**
	 * Remove an item from the queue.
	 * 
	 * @return object An item from the queue.
	 */
	public function dequeue(): object;
}
