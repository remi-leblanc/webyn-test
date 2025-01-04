import { Injectable } from '@angular/core';
import { TrafficEndpoint } from './traffic-endpoint';

@Injectable({
	providedIn: 'root',
})
export class TrafficService {
	readonly url = 'https://localhost:8000/api/traffic';

	async getAll(): Promise<TrafficEndpoint[]> {
		const data = await fetch(this.url,
			{
				method: "GET"
			}
		);
		return (await data.json()) ?? [];
	}
	
}