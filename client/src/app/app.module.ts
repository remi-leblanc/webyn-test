import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './app.component';
import { Dashboard } from './dashboard/dashboard.component';
import { BaseChartDirective } from 'ng2-charts';
import {
	provideCharts,
	withDefaultRegisterables,
} from 'ng2-charts';

@NgModule({
	imports: [BrowserModule, CommonModule, FormsModule, BaseChartDirective],
	declarations: [AppComponent, Dashboard],
	providers: [provideCharts(withDefaultRegisterables())],
	bootstrap: [AppComponent],
})
export class AppModule { }