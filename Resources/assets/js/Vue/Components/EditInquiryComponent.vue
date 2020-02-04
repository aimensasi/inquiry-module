<template>
	<div class="wrapper">
		<div class="btn-back d-flex">
			<i class="fal fa-arrow-left fa-lg"></i>
			<a :href="back">Inquiries</a>
		</div>

		<div class="page-title">
    	<span class="page-text">
				<i class="fal fa-envelope-open-text mr-2"></i>
				Edit Inquiry
			</span>
  	</div>

		<div class="card mt-5">
			<div class="card-header d-flex align-items-center">
				<h4 class="card-title">Inquiry Details</h4>
			</div>
			<div class="card-body">
				<form class="form">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label class="text-grey-darkest uppercase">Name</label>
							 	<input type="text" class="form-control" v-model="inquiry.name"/>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label class="text-grey-darkest uppercase">Email Address</label>
								<input type="text" class="form-control" v-model="inquiry.email"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label class="text-grey-darkest uppercase">Message</label>
							 	<textarea rows="15" class="form-control" v-model="inquiry.message" disabled></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label class="text-grey-darkest uppercase">Status</label>
							 	<input type="text" class="form-control" v-model="inquiry.status"/>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label class="text-grey-darkest uppercase">Sent At</label>
							 	<input type="text" class="form-control" v-model="inquiry.sent_at"/>
							</div>
						</div>
						<div class="col">
							<div class="form-group d-flex flex-column">
								<label class="text-grey-darkest uppercase" v-if="!resolved">Mark As Resolved</label>
								<label class="text-grey-darkest uppercase" v-if="resolved">Resolved At</label>
								<toggle-button
									color="#1f3d4e"
									:sync="true"
									@change="onResolved"
									v-model="resolved"
									v-if="!resolved"/>
									<input type="text" class="form-control" v-model="inquiry.resolved_at" v-if="resolved" disabled/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col d-flex">
							<button type="button" class="btn btn-primary ml-auto" @click="onSave">Save</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</template>

<script>
	import InquiryServices from './../Services/InquiryServices';

	export default {
		props: {
			id: {
				required: true,
				type: Number
			}
		},
		data: function(){
			return {
				inquiry: {},
				resolved: false,
				back: route('admin.inquiries.index').url()
			}
		},
		mounted(){
			this.setDefaults();
		},
		methods: {
			setDefaults: function(){
				InquiryServices.get(this, { id: this.id, onSuccess: ({ data }) => {
					this.inquiry = data.inquiry;
					this.resolved = this.inquiry.resolved_at ? true : false;
				}});
			},
			onResolved: function(){
				this.inquiry.resolved_at = moment().format('DD/MM/YYYY hh:mm A');
			},
			onSave: function(){

			}
		}
	}
</script>

<style lang="css" scoped>
</style>
