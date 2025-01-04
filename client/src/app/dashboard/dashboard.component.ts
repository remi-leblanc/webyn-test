import { Component, inject, ViewChild } from '@angular/core';
import { TrafficEndpoint } from './traffic-endpoint';
import { TrafficService } from './traffic-service';
import { ChartConfiguration, ChartData, ChartType } from 'chart.js';
import { BaseChartDirective } from 'ng2-charts';

@Component({
	selector: 'app-dashboard',
	templateUrl: './dashboard.component.html',
	standalone: false,
})
export class Dashboard {
	trafficEndpointList: TrafficEndpoint[] = [];
	filteredTrafficEndpointList: TrafficEndpoint[] = [];
	trafficService: TrafficService = inject(TrafficService);

	@ViewChild(BaseChartDirective) chart: BaseChartDirective | undefined;

	public pieChartOptions: ChartConfiguration['options'] = {
		plugins: {
			legend: {
				display: true,
				position: 'right',
			},
			colors: {
				forceOverride: true
			  }
		},
	};
	public pieChartData: ChartData<'pie', number[], string | string[]> = {
		labels: this.filteredTrafficEndpointList.map(item => item.page_url),
		datasets: [
			{
				data: this.filteredTrafficEndpointList.map(item => item.traffic),
			},
		],
	};
	public pieChartType: ChartType = 'pie';

	filters = {
		threshold: 0
	}

	constructor() {
		this.trafficService.getAll().then((trafficEndpointList: TrafficEndpoint[]) => {
			this.trafficEndpointList = trafficEndpointList;
			this.filteredTrafficEndpointList = this.trafficEndpointList
			this.updateChart()
		});

	}

	filterResults() {
		if (!this.filters.threshold) {
			this.filteredTrafficEndpointList = this.trafficEndpointList;
			return;
		}
		this.filteredTrafficEndpointList = this.trafficEndpointList.filter((trafficEndpoint) =>
			trafficEndpoint?.traffic > this.filters.threshold
		);
		this.updateChart()
	}

	updateChart() {
		this.pieChartData.labels = this.filteredTrafficEndpointList.map(item => item.page_url)
		this.pieChartData.datasets[0].data = this.filteredTrafficEndpointList.map(item => item.traffic)
		this.chart?.update();
	}
}
