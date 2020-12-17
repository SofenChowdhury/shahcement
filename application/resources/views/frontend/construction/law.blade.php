@extends('layouts.frontend_layout')
@section('contents')
<!-- SECTION -->
<div class="content-grid"style="padding-left:10%;margin-bottom: 10px;">
	<div class="section-filters-bar v5">
		<div class="section-filters-bar-actions">
			<div class="filter-tabs">
				<div class="filter-tab active">
					<p class="filter-tab-text">All Construction Rules</p>
				</div>
			</div>
			<form class="form">
				<div class="form-select">
					<label for="forum-filter-category">Filter By</label>
					<select id="forum-filter-category" name="forum_filter_category">
						<option value="0">Topics Started</option>
						<option value="1">My Replies</option>
						<option value="2">Liked Topics</option>
					</select>
					<svg class="form-select-icon icon-small-arrow">
						<use xlink:href="#svg-small-arrow"></use>
					</svg>
				</div>
			</form>
		</div>
		<div class="section-filters-bar-actions">
			<form class="form">
				<div class="form-item split medium">
					<div class="form-select small">
						<label for="forum-filter-order">Order By</label>
						<select id="forum-filter-order" name="forum_filter_order">
							<option value="0">Newest First</option>
							<option value="1">Oldest First</option>
						</select>
						<svg class="form-select-icon icon-small-arrow">
							<use xlink:href="#svg-small-arrow"></use>
						</svg>
					</div>
					<button class="button primary">Apply Filter</button>
				</div>
			</form>
		</div>
	</div>
	<!-- TABLE -->
	<div class="table table-forum-discussion">
		<!-- TABLE HEADER -->
		<div class="table-header">
			<div class="table-header-column">
				<p class="table-header-title">Construction Rules</p>
			</div>
			<div class="table-header-column padded-big-left">
				<p class="table-header-title">Author</p>
			</div>
		</div>
		<!-- /TABLE HEADER -->
		
		<!-- TABLE BODY -->
		<div class="table-body">
			<!-- TABLE ROW -->
			<div class="table-row medium">
				<div class="table-column">
					<div class="discussion-preview">
						<a class="discussion-preview-title" href="forums-discussion.html">The recent issue of "Darkman" features a new masked hero</a>
						<div class="discussion-preview-meta">
							<p class="discussion-preview-meta-text">Started by</p>
							<a class="user-avatar micro no-border" href="profile-timeline.html">
								<div class="user-avatar-content">
									<div class="hexagon-image-18-20" data-src="{{asset('assets/frontend/img/avatar/01.jpg')}}"></div>
								</div>
							</a>
							<p class="discussion-preview-meta-text"><a href="profile-timeline.html">Marina Valentine</a> 22 minutes ago<span class="separator">-</span><a class="highlighted" href="forums-category.html">Comics</a></p>
						</div>
					</div>
				</div>
				<div class="table-column padded-big-left">
					<div class="user-status">
						<a class="user-status-avatar" href="profile-timeline.html">
							<div class="user-avatar small no-outline">
								<div class="user-avatar-content">
									<div class="hexagon-image-30-32" data-src="{{asset('assets/frontend/img/avatar/04.jpg')}}"></div>
								</div>
								<div class="user-avatar-progress">
									<div class="hexagon-progress-40-44"></div>
								</div>
								<div class="user-avatar-progress-border">
									<div class="hexagon-border-40-44"></div>
								</div>
								<div class="user-avatar-badge">
									<div class="user-avatar-badge-border">
										<div class="hexagon-22-24"></div>
									</div>
									<div class="user-avatar-badge-content">
										<div class="hexagon-dark-16-18"></div>
									</div>
									<p class="user-avatar-badge-text">6</p>
								</div>
							</div>
						</a>
						<p class="user-status-title"><a class="bold" href="profile-timeline.html">Bearded Wonder</a></p>
						<p class="user-status-text small">3 hours, 22 minutes ago</p>
					</div>
				</div>
			</div>
			<!-- /TABLE ROW -->
			<!-- TABLE ROW -->
			<div class="table-row medium">
				<div class="table-column">
					<div class="discussion-preview">
						<a class="discussion-preview-title" href="forums-discussion.html">What do you like and dislike about the new forum looks?</a>
						<div class="discussion-preview-meta">
							<p class="discussion-preview-meta-text">Started by</p>
							<a class="user-avatar micro no-border" href="profile-timeline.html">
								<div class="user-avatar-content">
									<div class="hexagon-image-18-20" data-src="{{asset('assets/frontend/img/avatar/01.jpg')}}"></div>
								</div>
							</a>
							<p class="discussion-preview-meta-text"><a href="profile-timeline.html">Marina Valentine</a> 1 day ago<span class="separator">-</span><a class="highlighted" href="forums-category.html">Community Hangout</a></p>
						</div>
					</div>
				</div>
				<div class="table-column padded-big-left">
					<!-- USER STATUS -->
					<div class="user-status">
						<a class="user-status-avatar" href="profile-timeline.html">
							<div class="user-avatar small no-outline">
								<div class="user-avatar-content">
									<div class="hexagon-image-30-32" data-src="{{asset('assets/frontend/img/avatar/01.jpg')}}"></div>
								</div>
								<div class="user-avatar-progress">
									<div class="hexagon-progress-40-44"></div>
								</div>
								<div class="user-avatar-progress-border">
									<div class="hexagon-border-40-44"></div>
								</div>
								<div class="user-avatar-badge">
									<div class="user-avatar-badge-border">
										<div class="hexagon-22-24"></div>
									</div>
									<div class="user-avatar-badge-content">
										<div class="hexagon-dark-16-18"></div>
									</div>
									<p class="user-avatar-badge-text">24</p>
								</div>
							</div>
						</a>
						<p class="user-status-title"><a class="bold" href="profile-timeline.html">Marina Valentine</a></p>
						<p class="user-status-text small">42 minutes ago</p>
					</div>
				</div>
			</div>
			<!-- /TABLE ROW -->
		</div>
	</div>
</div>