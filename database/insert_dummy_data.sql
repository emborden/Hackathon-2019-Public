
-- The actual password is "some user-provided password"
INSERT INTO users
  (password, username, karma)
VALUES
  ('$2a$10$LTnRaD7lm4GXvriprg48KuZZ93ayLx4pLmk3WYogr6wo/Gvr0XI5y', 'duxum', 12),
  ('$2a$10$GU.bTN78U8o5ejiSYw6RA.xivU2OOvSrFVg8MeWpqtz8f7J8aJ6eO', 'fake', 11),
  ('$2a$10$IsHB7DnF77lV0cz5YWmHCedtZr90GeumCuH2SC4MlRl.XRFZd63U2', 'nice_one', 12212),
  ('$2a$10$S9p2hCeWlpCr3vC.qYLtm.STvOw2VBkalhcLnbxUy65io4MUJjJRa', 'this_is_better', 122);


INSERT INTO gathering
  (name)
VALUES
  ('CS 156'),
  ('CS 210');

INSERT INTO photo
  (location)
VALUES
  ('http://www.collegescholarships.org/images/arizona-loans.jpg'),
  ('/storage/image/13123123');

INSERT INTO video
  (location)
VALUES
  ('https://www.youtube.com/watch?v=QT5Sm7ImdKc'),
  ('/storage/video/13123123');

INSERT INTO post
  (user_id, gathering_id, votes, content)
VALUES
  (2, 1, 213, 'The main thing is to do even numberred questions. That is how I passed'),
  (1, 3, 213, 'Osmosis is simply the movement of a solvent (such as water) through a semipermeable membrane (as of a living cell) into a solution of higher solute concentration that tends to equalize the concentrations of solute on the two sides of the membrane');







